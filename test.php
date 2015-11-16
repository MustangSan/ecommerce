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
$data = array( 'idAdministrador' => NULL,
               'email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho',
               'senha' => 'auhsuahs908039jaijs03');

echo "<br /><p>Insert into BD</p>";
if($testConnection->insert('administradores', $data)) {
   echo "<p>WORK!! insert</p>";
} else
   echo "<p>DONT WORK!! insert</p>";
//*/

/*
$data = array( 'email' => 'mustang@gmail.com',
               'nome' => 'Mustang San'
               );

$where = array('email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho'
               );
echo "<br /><p>Update from BD</p>";
if($testConnection->update("administradores", $data, $where)) {
   echo "<p>WORK!! update</p>";
} else
   echo "<p>DONT WORK!! update</p>";
//*/

/*
$data = array('email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho'
               );
echo "<br /><p>Delete from BD</p>";
if($testConnection->delete("administradores",$data)) {
   echo "<p>WORK!! delete</p>";
} else
   echo "<p>DONT WORK!! delete</p>";

//*/


echo "<br /><p>Closing connection</p>";
if($testConnection->close()) {
   echo "<p>WORK!! close</p>";
} else
   echo "<p>DONT WORK!! close</p>";

?>

</body>
</html>