<?php

/**
* Classe de conexão ao Banco de Dados
*/
class Database {

   //Configuracoes da conexao com BD
   var $host;
   var $username;
   var $password;
   var $dbname;
   var $port;
   var $socket;
   
   //ID da conexao
   var $connection_id = FALSE;

   //var $where_cache;

   
   function __construct()
   {
      include_once ("database/config.php");
      $this->host = $db_config["host"];
      $this->username = $db_config["username"];
      $this->password = $db_config["password"];
      $this->dbname = $db_config["dbname"];
      $this->port = $db_config["port"];
      $this->socket = $db_config["socket"];
   }

   function db_connect() {
      if ($this->port != NULL)
      {
         return @mysqli_connect($this->host, $this->username, $this->password, $this->dbname, $this->port);
      }
      else
      {
         return @mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
      }
   }

   function db_close($conn_id) {
      @mysqli_close($conn_id);
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

   function escape_str($str, $like = FALSE) {
      if (is_array($str)) {
         foreach ($str as $key => $val) {
            $str[$key] = $this->escape_str($val, $like);
         }

         return $str;
      }

      $str = mysqli_real_escape_string($this->connection_id, $str);

      return $str;
   }

   function escape($str) {
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

   function where($where) {
      if(isset($where) AND is_array($where)) {
         foreach ($where as $key => $value) {
            $conditions[] = $key . " = " . $this->escape($value);
         }
      }
      return $conditions = " WHERE " . implode(" AND ", $conditions);
   }

   function set($set) {
      if(isset($set) AND is_array($set)) {
         foreach ($set as $key => $value) {
            $finalSet[] = $key . " = " . $this->escape($value);
         }
      }
      return $finalSet = " SET " . implode(", ", $finalSet);
   }

   function insert_string($table, $data) {
      $fields = array();
      $values = array();

      foreach ($data as $key => $val) {
         $fields[] = $key;
         $values[] = $this->escape($val);
      }

      return $this->db_insert($table, $fields, $values);
   }

   function db_insert($table, $keys, $values){
      return "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES (".implode(', ', $values).")";
   }

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

   function db_update($table, $set, $conditions) {
      return "UPDATE " . $table . " " . $set . $conditions;
   }

   function update_string($table, $data, $where) {
      $set = $this->set($data);
      $conditions = $this->where($where);
      return $this->db_update($table, $set, $conditions);
   }

   public function update($table, $data, $where) {
      if(isset($table) AND isset($where) AND is_array($where)) {
         $sql = $this->update_string($table, $data, $where);
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

   function db_delete($table, $where) {
      $conditions = $this->where($where);
      return "DELETE FROM ".$table.$conditions;
   }

   public function delete($table, $where) {
      if(isset($table) AND isset($where) AND is_array($where)) {
         $sql = $this->db_delete($table, $where);
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

}

?>