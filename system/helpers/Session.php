<?php

/*
 *---------------------------------------------------------------
 * SESSION
 *---------------------------------------------------------------
 * Classe que da auxilio para utilização de seção no sistema
 */

class Session {

   public static $userdata = array();

   function __construct(){
      session_start();
   }

   public function setUserdata($params = array()) {
      foreach ($params as $key => $value) {
         $_SESSION[$key] = $value;
      }
      $this->userdata = $_SESSION;
   }

   public function userdata($key){
      return $this->userdata($key);
   }

   public function unsetUserdata(){
      $this->userdata = array();
      session_unset();
   }

   public function destroySession(){
      session_unset();
      session_destroy(); 
   }
}