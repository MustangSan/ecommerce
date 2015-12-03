<?php

class Produto {

   private $idProduto;
   private $idEstoqueProduto;
   private $nome;
   private $descricao;
   private $marca;
   private $material;
   private $publico;
   private $fechamento;
   private $adicional;
   private $qtdEstoque;
   private $cor;
   private $numeracao;

   function __construct($idProduto, $idEstoqueProduto, $nome, $descricao,
                        $marca, $material, $publico, $fechamento, 
                        $adicional, $qtdEstoque, $cor, $numeracao) {
      $this->setIdProduto($idProduto);
      $this->setIdEstoqueProduto($idEstoqueProduto);
      $this->setNome($nome);
      $this->setDescricao($descricao);
      $this->setMarca($marca);
      $this->setMaterial($material);
      $this->setPublico($publico);
      $this->setFechamento($fechamento);
      $this->setAdicional($adicional);
      $this->setQtdEstoque($qtdEstoque);
      $this->setCor($cor);
      $this->setNumeracao($numeracao);
   }

   public function setIdProduto($newValue) {
      $this->idProduto = $newValue;
   }

   public function setIdEstoqueProduto($newValue) {
      $this->idEstoqueProduto = $newValue;
   }

   public function setNome($newValue) {
      $this->nome = $newValue;
   }

   public function setDescricao($newValue) {
      $this->descricao = $newValue;
   }

   public function setMarca($newValue) {
      $this->marca = $newValue;
   }

   public function setMaterial($newValue) {
      $this->material = $newValue;
   }

   public function setPublico($newValue) {
      $this->publico = $newValue;
   }

   public function setFechamento($newValue) {
      $this->fechamento = $newValue;
   }

   public function setAdicional($newValue) {
      $this->adicional = $newValue;
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


   public function getIdProduto() {
      return $this->idProduto;
   }

   public function getIdEstoqueProduto() {
      return $this->idEstoqueProduto;
   }

   public function getNome() {
      return $this->nome;
   }

   public function getDescricao() {
      return $this->descricao;
   }

   public function getMarca() {
      return $this->marca;
   }

   public function getMaterial() {
      return $this->material;
   }

   public function getPublico() {
      return $this->publico;
   }

   public function getFechamento() {
      return $this->fechamento;
   }

   public function getAdicional() {
      return $this->adicional;
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
}