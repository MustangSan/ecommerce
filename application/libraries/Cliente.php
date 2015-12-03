<?php

class Cliente {

   private $idCliente;
   private $email;
   private $senha;
   private $nome;
   private $cpf;
   private $telefone;
   private $celular;
   private $endereco;

   function __construct($idCliente, $email, $senha, $nome, 
                        $cpf, $telefone, $celular, $endereco = NULL) {
      $this->setIdCliente($idCliente);
      $this->setEmail($email);
      $this->setSenha($senha);
      $this->setNome($nome);
      $this->setCPF($cpf);
      $this->setTelefone($telefone);
      $this->setCelular($celular);
      $this->setEndereco($endereco);
   }

   public function setIdCliente($newValue) {
      $this->idCliente = $newValue;
   }

   public function setEmail($newValue) {
      $this->email = $newValue;
   }

   public function setSenha($newValue) {
      $this->senha = $newValue;
   }

   public function setNome($newValue) {
      $this->nome = $newValue;
   }

   public function setCPF($newValue) {
      $this->cpf = $newValue;
   }

   public function setTelefone($newValue) {
      $this->telefone = $newValue;
   }

   public function setCelular($newValue) {
      $this->celular = $newValue;
   }

   public function setEndereco($newValue) {
      $this->endereco = $newValue;
   }


   public function getIdCliente() {
      return $this->idCliente;
   }

   public function getEmail() {
      return $this->email;
   }

   public function getSenha() {
      return $this->senha;
   }

   public function getNome() {
      return $this->nome;
   }

   public function getCPF() {
      return $this->cpf;
   }

   public function getTelefone() {
      return $this->telefone;
   }

   public function getCelular() {
      return $this->celular;
   }

   public function getEndereco() {
      return $this->endereco;
   }
}