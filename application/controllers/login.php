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
   
   //private $session;

   /**
   * Construtor
   */
   function __construct() {
      parent::__construct();
      $this->load_library('Dominio');
      $this->load_helper('Session');
      $this->load_model('Cliente_model', 'Cliente');
   }

   public function index(){
      $this->load_view('login');
   }

   public function singIn(){
      if(empty($_POST))
         $this->index();
      else{
         $data['email'] = $_POST['email'];
         $senha = $_POST['senha'];
         $cliente = $this->model['Cliente']->verificaLogin($data['email'], $senha);
         //var_dump($cliente);
         if(!is_bool($cliente)){
            $data['idCliente'] = $cliente->getIdCliente();
            $data['nome'] = $cliente->getNome();
            $this->helper['Session']->setUserdata($data);
            $this->redirect('home');
         //var_dump($this->helper['Session']->getUserdata());
         }
         $this->redirect('login');
      }
   }
}