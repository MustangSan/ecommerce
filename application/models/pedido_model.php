<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido_model extends TS_Model {
   
   function __construct() {
      parent::__construct();
      $this->load_database();
      $this->db->connect();
   }

   public function finalizarPedido($pedido, $carrinho) {
      if(isset($pedido) AND $pedido instanceof Pedido){
         $dadosPedido = array('idPedido'   => $pedido->getIdPedido(),
                              'data'       => $pedido->getData(),
                              'valorTotal' => $pedido->getValorTotal(),
                              'embalagem'  => rand(1,2),
                              'idEndereco' => $pedido->getIdEndereco(),
                              );
         $result1 = $this->db->insert('pedidos',$dadosPedido);
         $idPedido = $this->db->last_insert_id();

         foreach ($carrinho as $key => $produto) {
            $somaAux = $produto->getEstoqueProdutos()->getPreco()*$produto->getEstoqueProdutos()->getQtdEstoque();
            $dadosCarrinho = array('idPedido'         => $idPedido,
                                   'idProduto'        => $produto->getIdProduto(),
                                   'idEstoqueProduto' => $produto->getEstoqueProdutos()->getIdEstoqueProduto(),
                                   'qtdComprado'      => $produto->getEstoqueProdutos()->getQtdEstoque(),
                                   'valor'            => $somaAux);
            $this->db->insert('carrinho',$dadosCarrinho);
            /*Aqui iria atualizar o estoque tb*/
         }
         $dadoRelatorio = array('idCliente' => $pedido->getCliente()->getIdCliente(),
                              'idPedido'  => $idPedido
                              );
         $result3 = $this->db->insert('relatoriopedidos',$dadoRelatorio);

         if($result1 === TRUE AND $result3 === TRUE)
            return TRUE;
      }
      return FALSE;
   }

}