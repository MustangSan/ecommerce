/*
 *---------------------------------------------------------------
 * CLASSE PRODUTOS
 *---------------------------------------------------------------
 */

class Produtos {

	/**
	 * Atributos
	 */
	private $idProduto;
	private $nome;
	private $marca;
	private $material;
  private $publico;
  private $tipo;
  private $adicional;
  private $valor;

	/**
	 * Construtor
	 */
	public function __construct($idProduto, $nome, $marca, $material, $publico, $tipo, $adicional, $valor) {
		$this->setIdProduto($idProduto);
		$this->setNome($nome);
		$this->setMarca($marca);
		$this->setMaterial($material);
    $this->setPublico($publico);
    $this->setTipo($tipo);
    $this->setAdicional($adicional);
    $this->setValor($valor);
	}

	/**
	 * Getters
	 */
	public function getIdProduto() {
		return $this->idProduto;
	}
	public function getNome() {
		return $this->nome;
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
  public function getTipo() {
    return $this->tipo;
  }
  public function getAdicional() {
    return $this->adicional;
  }
  public function getValor() {
    return $this->valor;
  }

	/**
	 * Setters
	 */
	public function setIdProduto($newValue) {
		$this->idProduto = $newValue;
	}
	public function setNome($newValue) {
		$this->nome = $newValue;
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
  public function setTipo($newValue) {
    $this->tipo = $newValue;
  }
  public function setAdicional($newValue) {
    $this->adicional = $newValue;
  }
  public function setValor($newValue) {
    $this->valor = $newValue;
  }
};
/* End of file Produtos.php */
