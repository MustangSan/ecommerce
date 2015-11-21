/*
*---------------------------------------------------------------
* CLASSE USUARIOS
*---------------------------------------------------------------
*/

class Usuarios {

  /**
  * Atributos
  */
  private $idUsuario;
  private $nome;
  private $email;
  private $senha;
  private $sexo;
  private $cpf;
  private $endereco;
  private $cidade;
  private $estado;
  private $telefone;
  private $celular;
  private $cep;


  /**
  * Construtor
  */
  public function __construct($idUsuario, $nome, $email, $senha, $sexo, $cpf, $endereco, $cidade, $estado, $telefone, $celular, $cep) {
    $this->setIdUsuario($idUsuario);
    $this->setNome($nome);
    $this->setEmail($email);
    $this->setSenha($senha);
    $this->setSexo($sexo);
    $this->setCpf($cpf);
    $this->setEndereco($endereco);
    $this->setCidade($cidade);
    $this->setEstado($estado);
    $this->setTelefone($telefone);
    $this->setCelular($celular);
    $this->setCep($cep);
  }

  /**
  * Getters
  */
  public function getIdUsuario() {
    return $this->idUsuario;
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
  public function getSexo() {
    return $this->sexo;
  }
  public function getCpf() {
    return $this->cpf;
  }
  public function getEndereco() {
    return $this->endereco;
  }
  public function getCidade() {
    return $this->cidade;
  }
  public function getEstado() {
    return $this->estado;
  }
  public function getTelefone() {
    return $this->telefone;
  }
  public function getCelular() {
    return $this->celular;
  }
  public function getCep() {
    return $this->cep;
  }

  /**
  * Setters
  */
  public function setIdUsuario($newValue) {
    $this->idUsuario = $newValue;
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
  public function setSexo($newValue) {
    $this->sexo = $newValue;
  }
  public function setCpf($newValue) {
    $this->cpf = $newValue;
  }
  public function setEndereco($newValue) {
    $this->endereco = $newValue;
  }
  public function setCidade($newValue) {
    $this->cidade = $newValue;
  }
  public function setEstado($newValue) {
    $this->estado = $newValue;
  }
  public function setTelefone($newValue) {
    $this->telefone = $newValue;
  }
  public function setCelular($newValue) {
    $this->celular = $newValue;
  }
  public function setCep($newValue) {
    $this->cep = $newValue;
  }
};
/* End of file Usuarios.php */
