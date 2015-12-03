<?php 

class Endereco {

	private $idEndereco;
	private $idCliente;
	private $rua;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $estado;
	private $cep;
	private $principal;

	function __construct($idEndereco, $idCliente, $rua, $numero,
								$complemento, $bairro, $cidade, $estado,
								$cep, $principal) {
		$this->setIdEndereco($idEndereco);
		$this->setIdCliente($idCliente);
		$this->setRua($rua);
		$this->setNumero($numero);
		$this->setComplemento($complemento);
		$this->setBairro($bairro);
		$this->setCidade($cidade);
		$this->setEstado($estado);
		$this->setCEP($cep);
		$this->setPrincipal($principal);
	}

	public function setIdEndereco($newValue) {
		$this->idEndereco = $newValue;
	}

	public function setIdCliente($newValue) {
		$this->idCliente = $newValue;
	}

	public function setRua($newValue) {
		$this->rua = $newValue;
	}

	public function setNumero($newValue) {
		$this->numero = $newValue;
	}

	public function setComplemento($newValue) {
		$this->complemento = $newValue;
	}

	public function setBairro($newValue) {
		$this->bairro = $newValue;
	}

	public function setCidade($newValue) {
		$this->cidade = $newValue;
	}

	public function setEstado($newValue) {
		$this->estado = $newValue;
	}

	public function setCEP($newValue) {
		$this->cep = $newValue;
	}

	public function setPrincipal($newValue) {
		$this->principal = $newValue;
	}

	public function getIdEndereco() {
		return $this->idEndereco;
	}

	public function getIdCliente() {
		return $this->idCliente;
	}

	public function getRua() {
		return $this->rua;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function getComplemento() {
		return $this->complemento;
	}

	public function getBairro() {
		return $this->bairro;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function getEstado() {
		return $this->estado;
	}

	public function getCEP() {
		return $this->cep;
	}

	public function getPrincipal() {
		return $this->principal;
	}
}