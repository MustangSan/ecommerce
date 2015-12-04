<?php

class EstoqueProduto {

   private $idProduto;
   private $idEstoqueProduto;
   private $qtdEstoque;
   private $cor;
   private $numeracao;
   private $preco;
   private $foto;


   function __construct($idProduto, $idEstoqueProduto, $qtdEstoque,
                        $cor, $numeracao, $preco, $foto) {
      $this->setIdProduto($idProduto);
      $this->setIdEstoqueProduto($idEstoqueProduto);
      $this->setQtdEstoque($qtdEstoque);
      $this->setCor($cor);
      $this->setNumeracao($numeracao);
      $this->setPreco($preco);
      $this->setFoto($foto);
   }

   public function setIdProduto($newValue) {
      $this->idProduto = $newValue;
   }

   public function setIdEstoqueProduto($newValue) {
      $this->idEstoqueProduto = $newValue;
   }

   public function setQtdEstoque($newValue) {
      $this->qtdEstoque = $newValue;
   }

   public function setCor($newValue) {
      $this->cor = $newValue;
   }

   public function setNumeracao($newValue) {
      $this->numeracao = $newValue;
   }

   public function setPreco($newValue) {
      $this->preco = $newValue;
   }

   public function setFoto($newValue) {
      $this->foto = $newValue;
   }


   public function getIdProduto() {
      return $this->idProduto;
   }

   public function getIdEstoqueProduto() {
      return $this->idEstoqueProduto;
   }

   public function getQtdEstoque() {
      return $this->qtdEstoque;
   }

   public function getCor() {
      return $this->cor;
   }

   public function getNumeracao() {
      return $this->numeracao;
   }

   public function getPreco() {
      return $this->preco;
   }

   public function getFoto() {
      return $this->foto;
   }
}