<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *---------------------------------------------------------------
 * MODEL CADASTRO
 *---------------------------------------------------------------
 * 
 * Model que trata as funções relacionadas ao objeto Cliente.
 * Todas as funções que necessitam de acessos ao banco de dados,
 * estão descritas neste arquivo.
 *
 */

class Cliente_model extends TS_Model {
   
   function __construct() {
      parant::__construct();
      $this->load_database();
      $this->db->connect();
   }

   public function inserirCliente($cliente) {
      if(isset($data) AND $data instanceof Cliente) {
         $dadosCliente = array('idCliente' => $cliente->getIdCliente(),
                               'email'     => $cliente->getEmail(),
                               'senha'     => $cliente->getSenha(),
                               'nome'      => $cliente->getNome(),
                               'cpf'       => $cliente->getCPF(),
                               'telefone'  => $cliente->getTelefone(),
                               'celular'   => $cliente->getCelular()
                              );
         $resultCliente = $this->db->inset('clientes', $dadosCliente);

         $endereco = $cliente->getEndereco();
         if(isset($endereco) AND $endereco instanceof Endereco AND $resultCliente === TRUE) {
            $dadosEndereco = array('idEndereco'  => $endereco->getIdEndereco(),
                                   'idCliente'   => $endereco->getIdCliente(),
                                   'rua'         => $endereco->getRua(),
                                   'numero'      => $endereco->getNumero(),
                                   'complemento' => $endereco->getComplemento(),
                                   'bairro'      => $endereco->getBairro(),
                                   'estado'      => $endereco->getEstado(),
                                   'cep'         => $endereco->getCEP(),
                                   'principal'   => $endereco->getPrincipal()
                                    );
            $resultEndereco = $this->db->inset('enderecos', $dadosEndereco);
            $this->db->close();
            
            if($resultCliente === TRUE AND $resultEndereco === TRUE)
               return TRUE;
            return FALSE;
         }
         return FALSE;
      }
      return FALSE;
   }

   public function editarCliente($cliente) {
      if(isset($data) AND $data instanceof Cliente) {
         $dadosCliente = array('idCliente' => $cliente->getIdCliente(),
                               'email'     => $cliente->getEmail(),
                               'senha'     => $cliente->getSenha(),
                               'nome'      => $cliente->getNome(),
                               'cpf'       => $cliente->getCPF(),
                               'telefone'  => $cliente->getTelefone(),
                               'celular'   => $cliente->getCelular()
                              );
         $this->db->where('idCliente', $cliente->getIdCliente());
         $resultCliente = $this->db->update('clientes', $dadosCliente);
         $this->db->close();
         
         if($resultCliente === TRUE)
            return TRUE;
         return FALSE;
      }
      return FALSE;
   }

   /*public function removerCliente($idCliente) {
      if(isset($idCliente)) {
         $this->db->where('idCliente', $idCliente)
         $this->db->delete('enderecos');

         $this->db->where('idCliente', $idCliente)
         $resultCliente = $this->db->delete('clientes');
      }

      $this->db->close();
      
      if($resultCliente === TRUE)
         return TRUE;
      return FALSE;
   }*/

   public function inserirEndereco($endereco) {
      if(isset($endereco) AND $endereco instanceof Endereco) {
         $dadosEndereco = array('idEndereco'  => $endereco->getIdEndereco(),
                                'idCliente'   => $endereco->getIdCliente(),
                                'rua'         => $endereco->getRua(),
                                'numero'      => $endereco->getNumero(),
                                'complemento' => $endereco->getComplemento(),
                                'bairro'      => $endereco->getBairro(),
                                'estado'      => $endereco->getEstado(),
                                'cep'         => $endereco->getCEP(),
                                'principal'   => $endereco->getPrincipal()
                                 );
         $resultEndereco = $this->db->inset('enderecos', $dadosEndereco);
         $this->db->close();
         
         if($resultCliente === TRUE)
            return TRUE;
         return FALSE;
      }
      return FALSE;
   }

   public function editarEndereco($endereco) {
      if(isset($endereco) AND $endereco instanceof Endereco) {
         $dadosEndereco = array('idEndereco'  => $endereco->getIdEndereco(),
                                'idCliente'   => $endereco->getIdCliente(),
                                'rua'         => $endereco->getRua(),
                                'numero'      => $endereco->getNumero(),
                                'complemento' => $endereco->getComplemento(),
                                'bairro'      => $endereco->getBairro(),
                                'estado'      => $endereco->getEstado(),
                                'cep'         => $endereco->getCEP(),
                                'principal'   => $endereco->getPrincipal()
                                 );
         $this->db->where('idEndereco', $endereco->getIdEndereco());
         $resultEndereco = $this->db->update('enderecos', $dadosEndereco);
         $this->db->close();
         
         if($resultCliente === TRUE)
            return TRUE;
         return FALSE;
      }
      return FALSE;
   }

   public function getCliente($idCliente) {
      if(isset($idCliente)) {
         $this->db->where('idCliente', $idCliente);
         $query = $this->db->get('clientes');
         $this->db->close();
         
         $num_rows = count($query);
         if($num_rows == 0)
            return NULL;
         
         $row = $query[0];
         return new Cliente($row->idCliente,
                            $row->email,
                            $row->senha,
                            $row->nome,
                            $row->cpf,
                            $row->telefone,
                            $row->celular
                           );
      }
   }
}