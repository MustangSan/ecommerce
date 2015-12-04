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

   public function addCarrinho(){
      $idProduto = $_POST['idProduto'];
      $idEstoqueProduto = $_POST['idProdutoEstoque'];
      $qtdProduto = $_POST['qtdProduto'];
      $produto = $this->model['Produto']->getProduto($idProduto, $idEstoqueProduto);
      $produto->getEstoqueProdutos()->setQtdEstoque($qtdProduto);
      $data['Produto'.$idEstoqueProduto] = $produto;
      $this->helper['Session']->setUserdata($data);
      $this->redirect('home/carrinho');
   }

   public function carrinho(){
      $carrinho = $_SESSION;
      unset($carrinho['email']);
      unset($carrinho['nome']);
      unset($carrinho['idCliente']);
      $data['carrinho'] = $carrinho;
      $soma=0;
      foreach ($carrinho as $key => $produto) {
         $somaAux = $produto->getEstoqueProdutos()->getPreco()*$produto->getEstoqueProdutos()->getQtdEstoque();
         $soma += $somaAux;
      }
      $data['valorCompra'] = $soma;
      $this->load_view('cart', $data);
   }

   public function removeProduto($idEstoqueProduto) {
      unset($_SESSION['Produto'.$idEstoqueProduto]);
      $this->redirect('home/carrinho');
   }

   public function somaProduto($idEstoqueProduto){
      $_SESSION['Produto'.$idEstoqueProduto]->getEstoqueProdutos()->setQtdEstoque($_SESSION['Produto'.$idEstoqueProduto]->getEstoqueProdutos()->getQtdEstoque()+1);
      $this->redirect('home/carrinho');
   }

   public function subtraiProduto($idEstoqueProduto){
      $_SESSION['Produto'.$idEstoqueProduto]->getEstoqueProdutos()->setQtdEstoque($_SESSION['Produto'.$idEstoqueProduto]->getEstoqueProdutos()->getQtdEstoque()-1);
      $this->redirect('home/carrinho');
   }
}