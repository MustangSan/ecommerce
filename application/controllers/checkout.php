<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Checkout extends TS_Controller {
   
   //private $session;

   /**
   * Construtor
   */
   function __construct() {
      parent::__construct();
      $this->load_helper('Session');
      $this->load_library('Dominio');
      $this->load_model('Produto_model', 'Produto');
      $this->load_model('Cliente_model', 'Cliente');
      $this->load_model('Pedido_model', 'Pedido');
   }
   public function index(){
      if($this->model['Cliente']->logged())
         $this->redirect('login');

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
      $idCliente = $_SESSION['idCliente'];
      $data['cliente'] = $this->model['Cliente']->getCliente($idCliente, 1);

      $this->load_view('checkout',$data);
   }

   public function finalizarCompra() {
      $carrinho = $_SESSION;
      unset($carrinho['email']);
      unset($carrinho['nome']);
      unset($carrinho['idCliente']);
      $soma=0;
      foreach ($carrinho as $key => $produto) {
         $somaAux = $produto->getEstoqueProdutos()->getPreco()*$produto->getEstoqueProdutos()->getQtdEstoque();
         $soma += $somaAux;
      }
      $idCliente = $_SESSION['idCliente'];
      $cliente = $this->model['Cliente']->getCliente($idCliente, 1);
      $dateHoje = getdate();
      $dateHoje = $dateHoje['mday'] . "/" . $dateHoje['mon'] . "/" . $dateHoje['year'];
      $idEndereco = $cliente->getEndereco()->getIdEndereco();

      $pedido = new Pedido(NULL,
                           $dateHoje,
                           $soma,
                           NULL,
                           $idEndereco,
                           $cliente
                           );

      $this->model['Pedido']->finalizarPedido($pedido, $carrinho);

      $dataSession['email'] = $_SESSION['email'];
      $dataSession['nome'] = $_SESSION['nome'];
      $dataSession['idCliente'] = $_SESSION['idCliente'];

      $this->helper['Session']->unsetUserdata();
      $this->helper['Session']->setUserdata($dataSession);
      $this->load_view('sucesso');
   }
}