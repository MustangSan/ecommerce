<html>
<body>

<?php
include_once ("database/database.php");

$testConnection = new Database();

echo "<p>Opening connection</p>";
if($testConnection->connect()){
   echo "<p>WORK connect!!</p>";
} else
   echo "<p>DONT WORK connect!!</p>";

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