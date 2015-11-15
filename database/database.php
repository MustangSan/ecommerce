<?php

/**
* Classe de conexão ao Banco de Dados
*/
class Database {

   var $host;
   var $username;
   var $password;
   var $dbname;
   var $port;
   var $socket;
   var $connection_id = FALSE;

   
   function __construct()
   {
      include ("database/config.php");
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
         //exit();
      }
      else{
         //printf ("System status: %s\n", $this->connection_id->stat());
         return TRUE;
      }
   }

   public function close(){
      if (is_resource($this->connection_id) OR is_object($this->connection_id)){
         $this->db_close($this->connection_id);
      }
      //echo ("System status: %s\n");
      //var_dump(get_object_vars($this->connection_id));
      $this->connection_id = FALSE;
      
      if(!$this->connection_id){
         return TRUE;
      }

   }

}

?>