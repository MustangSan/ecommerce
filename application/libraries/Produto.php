<?php

class Produto {

   private $idProduto;
   private $nome;
   private $descricao;
   private $marca;
   private $material;
   private $publico;
   private $fechamento;
   private $adicional;
   private $estoqueProdutos;

   function __construct($idProduto, $nome, $descricao, $marca, $material,
                        $publico, $fechamento, $adicional, $estoqueProdutos) {
      $this->setIdProduto($idProduto);
      $this->setNome($nome);
      $this->setDescricao($descricao);
      $this->setMarca($marca);
      $this->setMaterial($material);
      $this->setPublico($publico);
      $this->setFechamento($fechamento);
      $this->setAdicional($adicional);
      $this->setEstoqueProdutos($estoqueProdutos);
   }

   public function setIdProduto($newValue) {
      $this->idProduto = $newValue;
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

   public function setEstoqueProdutos($newValue) {
      $this->estoqueProdutos = $newValue;
   }


   public function getIdProduto() {
      return $this->idProduto;
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

   public function getEstoqueProdutos() {
      return $this->estoqueProdutos;
   }
}