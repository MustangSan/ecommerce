<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 *---------------------------------------------------------------------------------
 * CONTROLLER LOGOUT
 *---------------------------------------------------------------------------------
 * 
 * Responsável por controlar toda a lógica computacional das funções 
 * relacionadas ao logout. 
 *
 */

class Logout extends TS_Controller {
   
   private $session;

   /**
   * Construtor
   */
   function __construct() {
      parent::__construct();
      $this->session = $this->load_helper('Session');
   }

   public function index(){
      $this->session->destroySession();
      $base_url = BASEURL.'login';

      header("Location: " . $base_url);
      /* Make sure that code below does not get executed when we redirect. */
      exit;
      /*
      $ch = curl_init();

      // set URL and other appropriate options
      curl_setopt($ch, CURLOPT_URL, $base_url);
      curl_setopt($ch, CURLOPT_HEADER, 0);

      // grab URL and pass it to the browser
      curl_exec($ch);

      // close cURL resource, and free up system resources
      curl_close($ch);
      //*/
   }

}