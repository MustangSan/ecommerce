<?php 

class Pedido {

   private $idPedido;
   private $data;
   private $valorTotal;
   private $embalagem;
   private $idEndereco;
   private $cliente;

   function __construct($idPedido, $data, $valorTotal, 
                        $embalagem, $idEndereco, $cliente=NULL;) {
      $this->setIdPedido($idPedido);
      $this->setData($data);
      $this->setValorTotal($valorTotal);
      $this->setEmbalagem($embalagem);
      $this->setIdEndereco($idEndereco);
      $this->setCliente($cliente);
   }

   public function setIdPedido($newValue) {
      $this->idPedido = $newValue;
   }

   public function setData($newValue) {
      $this->data = $newValue;
   }

   public function setValorTotal($newValue) {
      $this->valorTotal = $newValue;
   }

   public function setEmbalagem($newValue) {
      $this->embalagem = $newValue;
   }

   public function setIdPedido($newValue) {
      $this->idPedido = $newValue;
   }

   public function setCliente($newValue) {
      $this->cliente = $newValue;
   }


   public function getIdPedido() {
      return $this->idPedido;
   }

   public function getData() {
      return $this->data;
   }

   public function getValorTotal() {
      return $this->valorTotal;
   }

   public function getEmbalagem() {
      return $this->embalagem;
   }

   public function getIdPedido() {
      return $this->idPedido;
   }

   public function getCliente() {
      return $this->cliente;
   }
                     
}