/*
*---------------------------------------------------------------
* CLASSE PEDIDOS
*---------------------------------------------------------------
*/

class Pedidos {

  /**
  * Atributos
  */
  private $idPedido;
  private $data;
  private $valorTotal;
  private $embalagem;
  private $enderecoEntrega;
  private $cidadeEntrega;
  private $estadoEntrega;
  private $cepEntrega;

  /**
  * Construtor
  */
  public function __construct($idPedido, $data, $valorTotal, $embalagem, $enderecoEntrega, $cidadeEntrega, $estadoEntrega, $cepEntrega) {
    $this->setIdPedido($idPedido);
    $this->setData($data);
    $this->setValorTotal($valorTotal);
    $this->setEmbalagem($embalagem);
    $this->setEnderecoEntrega($enderecoEntrega);
    $this->setCidadeEntrega($cidadeEntrega);
    $this->setEstadoEntrega($estadoEntrega);
    $this->setCepEntrega($cepEntrega);
  }

  /**
  * Getters
  */
  public function getIdPedido() {
    return $this->idPedido;
  }
  public function getData() {
    return $this->data;
  }
  public function getValorTotal() {
    return $this->valorTotal;
  }
  public function getEmbalagem() {
    return $this->embalagem;
  }
  public function getEnderecoEntrega() {
    return $this->enderecoEntrega;
  }
  public function getCidadeEntrega() {
    return $this->cidadeEntrega;
  }
  public function getEstadoEntrega() {
    return $this->estadoEntrega;
  }
  public function getCepEntrega() {
    return $this->cepEntrega;
  }

  /**
  * Setters
  */
  public function setIdPedido($newValue) {
    $this->idPedido = $newValue;
  }
  public function setData($newValue) {
    $this->data = $newValue;
  }
  public function setValorTotal($newValue) {
    $this->valorTotal = $newValue;
  }
  public function setEmbalagem($newValue) {
    $this->embalagem = $newValue;
  }
  public function setEnderecoEntrega($newValue) {
    $this->enderecoEntrega = $newValue;
  }
  public function setCidadeEntrega($newValue) {
    $this->cidadeEntrega = $newValue;
  }
  public function setEstadoEntrega($newValue) {
    $this->estadoEntrega = $newValue;
  }
  public function setCepEntrega($newValue) {
    $this->cepEntrega = $newValue;
  }
};
/* End of file Pedidos.php */
