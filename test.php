<html>
<body>

<?php
include_once ("system/database/database.php");

$testConnection = new Database();

echo "<p>Opening connection</p>";
if($testConnection->connect()){
   echo "<p>WORK connect!!</p>";
} else
   echo "<p>DONT WORK connect!!</p>";


/*
echo "<br /><p>Test ORDER BY</p>";
$testConnection->order_by('email');
$testConnection->order_by('nome', 'DESC');
$testConnection->order_by('senha', 'ASC');
echo "<p>{$testConnection->order_by_return()}</p>";
//*/



echo "<br /><p>Get from BD</p>";
//$testConnection->where('email','mustang@gmail.com');
//$testConnection->where('nome','Mustang San');
echo "<p>Result: </p>";
//$testConnection->order_by('idAdministrador', "DESC");
//$testConnection->select('nome, senha, email');
//$testConnection->from('administradores');
//$result = $testConnection->get();
$result = $testConnection->get('administradores');
//print_r($result);
//echo "<br />";

if(is_array($result)) {
   echo "<table border=1 cellspacing=0 cellpadding=4>
            <tr>
               <th>ID</th>
               <th>Email</th>
               <th>Senha</th>
               <th>Nome</th>
            </tr>";
   //echo "<p>WORK!! get</p>";
   foreach ($result as $row) {
      echo "<tr>";
      echo "<td>{$row->idAdministrador}</td>";
      echo "<td>{$row->email}</td>";
      echo "<td>{$row->senha}</td>";
      echo "<td>{$row->nome}</td>";
      echo "</tr>";
   }
   echo "</table>";
} else
   echo "<p>DONT WORK!! get</p>";
//*/


/*
echo "<br /><p>Insert into BD</p>";
$data = array( 'idAdministrador' => NULL,
               'email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho',
               'senha' => 'auhsuahs908039jaijs03');

if($testConnection->insert('administradores', $data)) {
   echo "<p>WORK!! insert</p>";
} else
   echo "<p>DONT WORK!! insert</p>";
//*/

/*
echo "<br /><p>Update from BD</p>";
$data = array( 'email' => 'mustang@gmail.com',
               'nome' => 'Mustang San'
               );

$where = array('email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho'
               );
$testConnection->where($where);
if($testConnection->update("administradores", $data)) {
   echo "<p>WORK!! update</p>";
} else
   echo "<p>DONT WORK!! update</p>";
//*/

/*
echo "<br /><p>Delete from BD</p>";
$where = array('email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho'
               );
$testConnection->where($where);
if($testConnection->delete("administradores")) {
   echo "<p>WORK!! delete</p>";
} else
   echo "<p>DONT WORK!! delete</p>";

//*/

/*
echo "<br /><p>Test where array</p>";
$where = array('email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho'
               );
$testConnection->where($where);
echo "<p>{$testConnection->where_return()}</p>";

echo "<br /><p>Test where chamdas</p>";
$testConnection->where("email","guilherme.raminho@gmail.com");
$testConnection->where("nome","Guilherme Raminho");
$testConnection->where("senha","oiujasdhu83924uqowla");
echo "<p>{$testConnection->where_return()}</p>";
//*/

/*
echo "<br /><p>Test OR where array</p>";
$where = array('email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho'
               );
$testConnection->or_where($where);
echo "<p>{$testConnection->where_return()}</p>";

echo "<br /><p>Test OR where chamdas</p>";
$testConnection->or_where("email","guilherme.raminho@gmail.com");
$testConnection->or_where("nome","Guilherme Raminho");
$testConnection->or_where("senha","oiujasdhu83924uqowla");
echo "<p>{$testConnection->where_return()}</p>";
//*/

echo "<br /><p>Closing connection</p>";
if($testConnection->close()) {
   echo "<p>WORK!! close</p>";
} else
   echo "<p>DONT WORK!! close</p>";

?>

</body>
</html>