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
      parent::__construct();
      $this->load_database();
      $this->db->connect();
   }

   public function inserirCliente($cliente) {
      if(isset($cliente) AND $cliente instanceof Cliente) {
         $dadosCliente = array('idCliente' => $cliente->getIdCliente(),
                               'email'     => $cliente->getEmail(),
                               'senha'     => $cliente->getSenha(),
                               'nome'      => $cliente->getNome(),
                               'cpf'       => $cliente->getCPF(),
                               'telefone'  => $cliente->getTelefone(),
                               'celular'   => $cliente->getCelular()
                              );
         $resultCliente = $this->db->insert('clientes', $dadosCliente);
         $idCliente = $this->db->last_insert_id();

         $endereco = $cliente->getEndereco();
         $endereco->setIdCliente($idCliente);
         if(isset($endereco) AND $endereco instanceof Endereco AND $resultCliente === TRUE) {
            $dadosEndereco = array('idEndereco'  => $endereco->getIdEndereco(),
                                   'idCliente'   => $endereco->getIdCliente(),
                                   'rua'         => $endereco->getRua(),
                                   'numero'      => $endereco->getNumero(),
                                   'complemento' => $endereco->getComplemento(),
                                   'bairro'      => $endereco->getBairro(),
                                   'cidade'      => $endereco->getCidade(),
                                   'estado'      => $endereco->getEstado(),
                                   'cep'         => $endereco->getCEP(),
                                   'principal'   => $endereco->getPrincipal()
                                    );
            $resultEndereco = $this->db->insert('enderecos', $dadosEndereco);
            $this->db->close();
            
            if($resultEndereco === TRUE)
               return TRUE;
            return FALSE;
         }
         return FALSE;
      }
      return FALSE;
   }

   public function editarCliente($cliente) {
      if(isset($cliente) AND $cliente instanceof Cliente) {
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

   public function inserirEndereco($endereco) {
      if(isset($endereco) AND $endereco instanceof Endereco) {
         $dadosEndereco = array('idEndereco'  => $endereco->getIdEndereco(),
                                'idCliente'   => $endereco->getIdCliente(),
                                'rua'         => $endereco->getRua(),
                                'numero'      => $endereco->getNumero(),
                                'complemento' => $endereco->getComplemento(),
                                'bairro'      => $endereco->getBairro(),
                                'cidade'      => $endereco->getCidade(),
                                'estado'      => $endereco->getEstado(),
                                'cep'         => $endereco->getCEP(),
                                'principal'   => $endereco->getPrincipal()
                                 );
         $resultEndereco = $this->db->insert('enderecos', $dadosEndereco);
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
                                'cidade'      => $endereco->getCidade(),
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

   public function getCliente($idCliente, $endereco = 1) {
      if(isset($idCliente)) {
         if(!is_null($endereco)) {
            $this->db->where('idCliente', $idCliente);
            $this->db->where('principal', $endereco);
            $queryEndereco = $this->db->get('enderecos');
            $num_rows_Endereco = count($queryEndereco);
            if($num_rows_Endereco > 0) {
               $rowEndereco = $queryEndereco[0];
               $endereco = new Endereco($rowEndereco->idEndereco,
                                        $rowEndereco->idCliente,
                                        $rowEndereco->rua,
                                        $rowEndereco->numero,
                                        $rowEndereco->complemento,
                                        $rowEndereco->bairro,
                                        $rowEndereco->cidade,
                                        $rowEndereco->estado,
                                        $rowEndereco->cep,
                                        $rowEndereco->principal
                                       );
            }
         }

         $this->db->where('idCliente', $idCliente);
         $query = $this->db->get('clientes');
         $this->db->close();
         
         $num_rows_Cliente = count($query);
         if($num_rows_Cliente == 0)
            return NULL;
         
         $row = $query[0];
         return new Cliente($row->idCliente,
                            $row->email,
                            $row->senha,
                            $row->nome,
                            $row->cpf,
                            $row->telefone,
                            $row->celular,
                            $endereco
                           );
      }
   }

   public function verificaLogin($email, $senha=NULL) {
      $this->db->where('email', $email);
      if(!is_null($senha))
        $this->db->where('senha', md5($senha));
      $query = $this->db->get('clientes');
      $this->db->close();
      
      $num_rows_Cliente = count($query);
      if($num_rows_Cliente == 1){
         $row = $query[0];
         return new Cliente($row->idCliente,
                            $row->email,
                            $row->senha,
                            $row->nome,
                            $row->cpf,
                            $row->telefone,
                            $row->celular,
                            NULL
                           );
      }
      return FALSE;
   }

   public function logged() {
      if(isset($_SESSION['email']))
         return FALSE;
      return TRUE;
   }
}