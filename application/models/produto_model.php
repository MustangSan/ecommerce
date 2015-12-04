<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produto_model extends TS_Model {
   
   function __construct() {
      parent::__construct();
      $this->load_database();
      $this->db->connect();
   }

   public function listarProdutos() {
      $queryProduto = $this->db->get('produtos');
      $num_rows_Produtos = count($queryProduto);
      if($num_rows_Produtos > 0) {
         $produtos = array();
         foreach ($queryProduto as $rowProduto) {
            $this->db->where('idProduto', $rowProduto->idProduto);
            $queryEstoqueProduto = $this->db->get('estoqueProduto');
            $num_rows_EstoqueProduto = count($queryEstoqueProduto);
            $estoqueProduto = array();
            if($num_rows_EstoqueProduto > 0) {
               foreach ($queryEstoqueProduto as $rowEP) {
                  $estoqueProduto[] = new EstoqueProduto($rowEP->idProduto,
                                                         $rowEP->idEstoqueProduto,
                                                         $rowEP->qtdEstoque,
                                                         $rowEP->cor,
                                                         $rowEP->numeracao,
                                                         $rowEP->preco,
                                                         $rowEP->foto);
               }
            }
            else {
               $estoqueProduto = NULL;
            }
            $produtos[] = new Produto($rowProduto->idProduto,
                                      $rowProduto->nome,
                                      $rowProduto->descricao,
                                      $rowProduto->marca,
                                      $rowProduto->material,
                                      $rowProduto->publico,
                                      $rowProduto->fechamento,
                                      $rowProduto->adicional,
                                      $estoqueProduto);

         }
         return $produtos;
      }
      else
         return FALSE;
   }


   public function getProduto($idProduto, $idEstoqueProduto) {
      $this->db->where('idProduto', $idProduto);
      $queryProduto = $this->db->get('produtos');
      $num_rows_Produtos = count($queryProduto);
      if($num_rows_Produtos == 1) {
         $rowProduto = $queryProduto[0];

         $this->db->where('idProduto', $idProduto);
         $this->db->where('idEstoqueProduto', $idEstoqueProduto);
         $queryEstoqueProduto = $this->db->get('estoqueProduto');
         $num_rows_EstoqueProduto = count($queryEstoqueProduto);
         
         if($num_rows_EstoqueProduto == 1) {
            $rowEP = $queryEstoqueProduto[0];
            $estoqueProduto = new EstoqueProduto($rowEP->idProduto,
                                                 $rowEP->idEstoqueProduto,
                                                 $rowEP->qtdEstoque,
                                                 $rowEP->cor,
                                                 $rowEP->numeracao,
                                                 $rowEP->preco,
                                                 $rowEP->foto);
         }
         else {
            $estoqueProduto = NULL;
            return FALSE;
         }
         
         $produto = new Produto($rowProduto->idProduto,
                                $rowProduto->nome,
                                $rowProduto->descricao,
                                $rowProduto->marca,
                                $rowProduto->material,
                                $rowProduto->publico,
                                $rowProduto->fechamento,
                                $rowProduto->adicional,
                                $estoqueProduto);
         return $produto;
      }
      else
         return FALSE;
   }

}