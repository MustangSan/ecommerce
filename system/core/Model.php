<?php

/*
 *---------------------------------------------------------------
 * THE SHADOW MODEL
 *---------------------------------------------------------------
 * Classe base de todas as models
 */

class TS_Model {

   public $db;

   function __construct () {
      $this->db = NULL;
   }

   public function load_database(){
      require_once(BASEPATH.'database/database.php');
      $this->db = new Database();

   }
}