<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 *---------------------------------------------------------------------------------
 * CONTROLLER CADASTRO
 *---------------------------------------------------------------------------------
 * 
 * Responsável por controlar toda a lógica computacional das funções 
 * relacionadas as telas de cadastro. Tem a função de se 
 * comunicar com as models e as views, fazendo as chamadas nos momentos necessários.
 *
 */

class Cadastro extends TS_Controller {
   
   function __construct() {
      parent::__construct();
      $this->load_library('Dominio');
      $this->load_model('Cliente_model', 'Cliente');

   }

   public function index() {
      if(!empty($_POST)){
         $data = array('email' => $_POST['email'],
                       'senha' => $_POST['senha'],
                       'nome'  => $_POST['nome']
                      );
         $this->load_view('cadastro', $data);
      }
   }

   public function singUp() {
      if(!empty($_POST)){
         $endereco = new Endereco(NULL,
                                  NULL,
                                  $_POST['rua'],
                                  $_POST['numero'],
                                  $_POST['complemento'],
                                  $_POST['bairro'],
                                  $_POST['cidade'],
                                  $_POST['estado'],
                                  $_POST['cep'],
                                  1);

         $cliente = new Cliente(NULL,
                                $_POST['email'],
                                md5($_POST['senha']),
                                $_POST['nome'],
                                $_POST['cpf'],
                                $_POST['telefone'],
                                $_POST['celular'],
                                $endereco);
         $result = $this->model['Cliente']->inserirCliente($cliente);
         if($result){
            $base_url = BASEURL.'login';
            header("Location: " . $base_url);
            /* Make sure that code below does not get executed when we redirect. */
            exit;
         }
         else{
            $this->load_view('404');
         }
      }
   }
}