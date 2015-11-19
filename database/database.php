<?php

/**
* Classe de conexão ao Banco de Dados
*/
class Database {

   //Configuracoes da conexao com BD
   private $host;
   private $username;
   private $password;
   private $dbname;
   private $port;
   private $socket;
   
   //ID da conexao
   private $connection_id = FALSE;

   //Guarda as condições SELECT
   private $select_cache = NULL;

   //Guarda as condições FROM
   private $from_cache = NULL;

   //Guarda as condições WHERE
   private $where_cache = NULL;

   //Guarda as condições ORDER BY
   private $order_by_cache = NULL;
   
   //--------------------------------------------------------------------------------------------------

   /*
    * Construtor Padrão
    */
   function __construct() {
      include ("database/config.php");
      $this->host = $db_config["host"];
      $this->username = $db_config["username"];
      $this->password = $db_config["password"];
      $this->dbname = $db_config["dbname"];
      $this->port = $db_config["port"];
      $this->socket = $db_config["socket"];
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Abre conexão com o Banco de Dados
    */
   private function db_connect() {
      if ($this->port != NULL)
      {
         return @mysqli_connect($this->host, $this->username, $this->password, $this->dbname, $this->port);
      }
      else
      {
         return @mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
      }
   }

   public function connect(){
      $this->connection_id = $this->db_connect();
      if(!$this->connection_id) {
         echo "Error: Unable to connect to MySQL." . PHP_EOL;
         echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
         echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
         return FALSE;
         //exit();
      }
      else{
         //printf ("System status: %s\n", $this->connection_id->stat());
         return TRUE;
      }
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Fecha conexão com o Banco de Dados
    */
   private function db_close($conn_id) {
      @mysqli_close($conn_id);
   }

   public function close() {
      if (is_resource($this->connection_id) OR is_object($this->connection_id)){
         $this->db_close($this->connection_id);
      }
      //echo ("System status: %s\n");
      //var_dump(get_object_vars($this->connection_id));
      $this->connection_id = FALSE;
      
      if(!$this->connection_id){
         return TRUE;
      } else {
         return FALSE;
      }
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Escapa a string de forma que possa ser inserida no Banco de Dados
    * com a formatação correta
    */
   private function escape_str($str, $like = FALSE) {
      if (is_array($str)) {
         foreach ($str as $key => $val) {
            $str[$key] = $this->escape_str($val, $like);
         }
         return $str;
      }
      $str = mysqli_real_escape_string($this->connection_id, $str);
      return $str;
   }

   /*
    * Escapa a string para um dos tipos de valores, se for string chama a função escape_str
    */
   private function escape($str) {
      if (is_string($str)) {
         $str = "'".$this->escape_str($str)."'";
      }
      elseif (is_bool($str)) {
         $str = ($str === FALSE) ? 0 : 1;
      }
      elseif (is_null($str)) {
         $str = 'NULL';
      }
      return $str;
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Função que gera o codigo que será utilizado para adicionar os dados no Banco de Dados
    */
   private function db_insert($table, $keys, $values){
      return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES (".implode(', ', $values).")";
   }

   /*
    * Função que arruma os valores e as colunas onde seram inseridos
    */
   private function insert_string($table, $data) {
      $fields = array();
      $values = array();

      foreach ($data as $key => $val) {
         $fields[] = $key;
         $values[] = $this->escape($val);
      }

      return $this->db_insert($table, $fields, $values);
   }

   /*
    * Função que insere os dados no Banco de Dados
    */
   public function insert($table, $data){
      if(isset($table) AND isset($data)){
         $sql = $this->insert_string($table, $data);
         if(isset($sql)) {
            if (mysqli_query($this->connection_id, $sql)) {
                echo "New record created successfully";
                return TRUE;
            } else {
                echo "Error: " . $sql . "<br />" . mysqli_error($this->connection_id);
                return FALSE;
            }
         }
         else{
            return FALSE;
         }
      }
      else {
         return FALSE;
      }
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Função para determir a condição AND WHERE
    */
   public function where($where, $value = NULL) {
      if(isset($where) AND is_array($where)) {
         foreach ($where as $key => $value) {
            $conditions[] = $key . " = " . $this->escape($value);
         }
         $this->where_cache = implode(" AND ", $conditions);
      }
      elseif(isset($where) AND isset($value)){
            if(is_null($this->where_cache)){
               $this->where_cache = $where . " = " . $this->escape($value);
            }
            else{
               $this->where_cache .= " AND " . $where . " = " . $this->escape($value);
            }
      }
   }

   /*
    * Função para determir a condição OR WHERE
    */
   public function or_where($where, $value = NULL) {
      if(isset($where) AND is_array($where)) {
         foreach ($where as $key => $value) {
            $conditions[] = $key . " = " . $this->escape($value);
         }
         $this->where_cache = implode(" OR ", $conditions);
      }
      elseif(isset($where) AND isset($value)){
            if(is_null($this->where_cache)){
               $this->where_cache = $where . " = " . $this->escape($value);
            }
            else{
               $this->where_cache .= " OR " . $where . " = " . $this->escape($value);
            }
      }
   }

   /*
    * Função para determir a condição ORDER BY
    */
   public function order_by($field, $direction = " ASC") {
      if(isset($field) AND isset($direction)){
         if(is_null($this->order_by_cache)){
            $this->order_by_cache = $field . " " . $direction;
         }
         else{
            $this->order_by_cache .= ", " . $field . " " . $direction;
         }
      }
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Função para determinar a logica SET para o UPDATE(coluna = valor)
    */
   private function set($set) {
      if(isset($set) AND is_array($set)) {
         foreach ($set as $key => $value) {
            $finalSet[] = $key . " = " . $this->escape($value);
         }
      }
      return $finalSet = " SET " . implode(", ", $finalSet);
   }

   /*
    * Função que gera o codigo que será utilizado para atualizar os dados no Banco de Dados
    */
   private function db_update($table, $set, $conditions) {
      return "UPDATE " . $table . $set . $conditions;
   }

   /*
    * Função que arruma os valores e as colunas onde seram atualizados de acordo com as condições determinadas
    */
   private function update_string($table, $data) {
      $set = $this->set($data);
      $conditions = " WHERE " . $this->where_cache;
      $this->where_cache = NULL;
      return $this->db_update($table, $set, $conditions);
   }

   /*
    * Função que atualiza os dados no Banco de Dados
    */
   public function update($table, $data) {
      if(isset($table) AND isset($data) AND is_array($data)) {
         $sql = $this->update_string($table, $data);
         if(isset($sql)) {
            if (mysqli_query($this->connection_id, $sql)) {
                echo "New record updated successfully";
                return TRUE;
            } else {
                echo "Error: " . $sql . "<br />" . mysqli_error($this->connection_id);
                return FALSE;
            }
         }
         else{
            return FALSE;
         }
      }
      else {
         return FALSE;
      }
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Função que gera o codigo que será utilizado para atualizar os dados no Banco de Dados
    */
   private function db_delete($table) {
      $conditions = " WHERE " . $this->where_cache;
      $this->where_cache = NULL;
      return "DELETE FROM " . $table . $conditions;
   }

   /*
    * Função que remove os dados no Banco de Dados
    */
   public function delete($table) {
      if(isset($table)) {
         $sql = $this->db_delete($table);
         if(isset($sql)) {
            if (mysqli_query($this->connection_id, $sql)) {
                echo "New record deleted successfully";
                return TRUE;
            } else {
                echo "Error: " . $sql . "<br />" . mysqli_error($this->connection_id);
                return FALSE;
            }
         }
         else{
            return FALSE;
         }
      }
      else {
         return FALSE;
      }
   }

   //--------------------------------------------------------------------------------------------------

   /*
    * Função para selecionar as colunas que serão selecionadas para exibir valor
    */
   public function select($column) {
      if(isset($column) AND is_string($column)){
         if(is_null($this->select_cache)){
            $this->select_cache = $column;
         }
      }
   }

   public function from($table) {
      if(isset($table)){
         $this->from_cache = $table;
      }
   }

   /*
    * Função que gera o codigo que será utilizado para selecionar os dados no Banco de Dados
    */
   private function db_get($table, $select, $conditions, $order_by) {
      return "SELECT  " . $select . " FROM " . $table . $conditions . $order_by;
   }

   /*
    * Função que arruma os valores e as colunas que seram selecionados de acordo com as condições determinadas
    */
   private function get_string($table) {
      $select = "*";
      $conditions = "";
      $order_by = "";
      if(!is_null($this->select_cache)){
         $select = $this->select_cache;
         $this->select_cache = NULL;
      }
      if(!is_null($this->where_cache)) {
         $conditions = " WHERE " . $this->where_cache;
         $this->where_cache = NULL;
      }
      if(!is_null($this->order_by_cache)){
         $order_by = " ORDER BY " . $this->order_by_cache;
         $this->order_by_cache = NULL;
      }
      return $this->db_get($table, $select, $conditions, $order_by);
   }

   /*
    * Função que seleciona os dados no Banco de Dados
    */
   public function get($table = NULL) {
      if(is_null($table)) {
         $table = $this->from_cache;
      }
      if(isset($table)) {
         $sql = $this->get_string($table);
         if(isset($sql)) {
            //return $sql;
            $result = mysqli_query($this->connection_id, $sql);
            if (is_object($result)) {
               $query = array();
               while($row = mysqli_fetch_assoc($result))
                  $query[] = (object)$row;
               mysqli_free_result($result);
               //echo "New record selected successfully";
               return $query;
            } else {
                echo "Error: " . $sql . "<br />" . mysqli_error($this->connection_id);
                return FALSE;
            }//*/
         }
         else{
            return FALSE;
         }
      }
      else {
         return FALSE;
      }
   }

   //--------------------------------------------------------------------------------------------------


   //------------------------------------------DEBUG---------------------------------------------------
   public function order_by_return(){
      $result = $this->order_by_cache;
      $this->order_by_cache = NULL;
      return $result;
   }

   
   public function where_return(){
      $result = $this->where_cache;
      $this->where_cache = NULL;
      return $result;
   }
   //*/

   //--------------------------------------------------------------------------------------------------
}

?>