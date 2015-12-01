<?php

class Test_model extends TS_Model {

   function __construct() {
      parent::__construct();
      $this->load_database();
      $this->db->connect();
   }

   public function insere($data) {
      $result = $this->db->insert('administradores', $data);
      $this->db->close();
      if($result)
         return TRUE;
      return FALSE;
   }


   public function testeFunction()
   {
      echo "<p>função de teste</p>";
   }   
}