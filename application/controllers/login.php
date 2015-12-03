<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 *---------------------------------------------------------------------------------
 * CONTROLLER LOGIN
 *---------------------------------------------------------------------------------
 * 
 * Responsável por controlar toda a lógica computacional das funções 
 * relacionadas as telas de login. Tem a função de se 
 * comunicar com as models e as views, fazendo as chamadas nos momentos necessários.
 *
 */

class Login extends TS_Controller {
   
   private $session;

   /**
   * Construtor
   */
   function __construct() {
      parent::__construct();
      $session = $this->load_helper('Session');
   }

   public function index(){
      $this->load_view('login');
   }

   public function singIn(){
      if(empty($_POST))
         $this->index();
      else{
         $session->setUserdata($_POST);
         //$data['email'] = $_POST['email'];
         //$data['senha'] = $_POST['senha'];
         $this->load_view("testes/sucesso");
      }
   }

   public function singUp(){
      if(empty($_POST))
         $this->load_view('login');
      else{
         //$data['email'] = $_POST['email'];
         //$data['senha'] = $_POST['senha'];
         //$data['nome'] = $_POST['nome'];
         $session->setUserdata($_POST);
         $this->load_view("testes/sucesso");
      }
   }

}