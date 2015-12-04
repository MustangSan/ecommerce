<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *---------------------------------------------------------------
 * DOMÍNIO
 *---------------------------------------------------------------
 * 
 * A Library 'Domínio' é usada para incluir automaticamente todas
 * as classes que são usadas no código, de forma semelhante ao
 * recurso Auto-load do CodeIgniter, com a vantagem de que
 * podemos escolher quando carregar ou não essas classes.
 *
 */

class Dominio {
   
   function __construct()
   {
      require_once('Administrador.php');
      require_once('Cliente.php');
      require_once('Endereco.php');
      require_once('Pedido.php');
      require_once('Produto.php');
      require_once('EstoqueProduto.php');
   }
}