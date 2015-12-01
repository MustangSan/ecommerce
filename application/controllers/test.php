<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends TS_Controller {

   function __construct() {
      parent::__construct();
      $this->load_model('Test_model');
   }

   public function index() {
      //$s = $this->load_helper('Session');

      $data = array( 'teste' => 'Testando altas tretas',
                     'email' => 'guilherme.raminho@gmail.com',
                     'nome' => 'Guilherme Raminho',
                     'senha' => 'auhsuahs908039jaijs03',
                     'titulo' => 'Pickashoe');
      //$s->setUserdata($data);

      $this->load_view("testes/teste",$data);
   }

   public function insere(){
      $data = array( 'idAdministrador' => NULL,
                     'email' => 'teste@gmail.com',
                     'nome' => 'Teste Testando',
                     'senha' => 'hojsashjo382od32');
      $result = $this->model['Test_model']->insere($data);
      if($result)
         $this->load_view("testes/sucesso");
      else
         $this->load_view("testes/falha");
   }

   public function login(){
      //print_r($_POST);
      if(empty($_POST))
         $this->load_view('login');
      else{
         $s = $this->load_helper('Session');
         $s->setUserdata($_POST);
         //$data['email'] = $_POST['email'];
         //$data['senha'] = $_POST['senha'];
         $this->load_view("testes/sucesso");
      }
   }

   public function inicio(){
      $s = $this->load_helper('Session');
      $this->load_view("testes/sucesso");
   }

   public function singUp(){
      if(empty($_POST))
         $this->load_view('login');
      else{
         $data['email'] = $_POST['email'];
         $data['senha'] = $_POST['senha'];
         $data['nome'] = $_POST['nome'];
         $this->load_view("testes/sucesso", $data);
      }
   }

   public function metodo() {
      echo "<p>Função metodo da controller</p>";
   }

   public function parametro($parameto) {
      echo "<p>Função parameto da controller: {$parameto}</p>";
   }

   public function parametros($parameto1, $parameto2, $parameto3) {
      echo "<p>Função varios parametos da controller</p>";
      echo "<p>Parameto 1: {$parameto1}</p>";
      echo "<p>Parameto 2: {$parameto2}</p>";
      echo "<p>Parameto 3: {$parameto3}</p>";
   }
}

?>
