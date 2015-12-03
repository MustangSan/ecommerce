<?php

class Administrador {

   private $idAdministrador;
   private $email;
   private $senha;
   private $nome;

   function __construct($idAdministrador, $email, $senha, $nome) {
      $this->setIdAdministrador($idAdministrador);
      $this->setEmail($email);
      $this->setSenha($senha);
      $this->setNome($nome);
   }

   public function setIdAdministrador($newValue) {
      $this->idAdministrador = $newValue;
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


   public function getIdAdministrador() {
      return $this->idAdministrador;
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
}