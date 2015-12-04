<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Home extends TS_Controller {
   
   //private $session;

   /**
   * Construtor
   */
   function __construct() {
      parent::__construct();
      $this->load_helper('Session');
      $this->load_library('Dominio');
      $this->load_model('Produto_model', 'Produto');
   }

   public function index(){
      $data['produtos'] = $this->model['Produto']->listarProdutos();
      $this->load_view('index', $data);
   }

   public function detalhesProduto($idProduto, $idEstoqueProduto) {
      $data['produto'] = $this->model['Produto']->getProduto($idProduto, $idEstoqueProduto);
      $this->load_view('product', $data);  
   }
}