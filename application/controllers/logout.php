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
   
   //private $session;

   /**
   * Construtor
   */
   function __construct() {
      parent::__construct();
      $this->load_helper('Session');
   }

   public function index(){
      $this->helper['Session']->destroySession();
      $this->redirect('home');
   }

}