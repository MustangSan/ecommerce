/*
 *---------------------------------------------------------------
 * CLASSE ADMINISTRADOR
 *---------------------------------------------------------------
 */

class Administrador {

	/**
	 * Atributos
	 */
	private $idAdministrador;
	private $nome;
	private $email;
	private $senha;

	/**
	 * Construtor
	 */
	public function __construct($idAdministrador, $nome, $email, $senha) {
		$this->setIdAdministrador($idAdministrador);
		$this->setNome($nome);
		$this->setEmail($email);
		$this->setSenha($senha);
	}

	/**
	 * Getters
	 */
	public function getIdAdministrador() {
		return $this->idAdministrador;
	}
	public function getNome() {
		return $this->nome;
	}

	public function getEmail() {
		return $this->email;
	}
	public function getSenha() {
		return $this->senha;
	}

	/**
	 * Setters
	 */
	public function setIdAdministrador($newValue) {
		$this->idAdministrador = $newValue;
	}

	public function setNome($newValue) {
		$this->nome = $newValue;
	}
	public function setEmail($newValue) {
		$this->email = $newValue;
	}
	public function setSenha($newValue) {
		$this->senha = $newValue;
	}
};
/* End of file Administrador.php */
