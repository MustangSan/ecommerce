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

$data = array( 'idAdministrador' => NULL,
               'email' => 'guilherme.raminho@gmail.com',
               'nome' => 'Guilherme Raminho',
               'senha' => 'auhsuahs908039jaijs03');

echo "<br /><p>Insert into BD</p>";
if($testConnection->insert('administradores', $data)) {
   echo "<p>WORK!! insert</p>";
} else
   echo "<p>DONT WORK!! insert</p>";


echo "<br /><p>Closing connection</p>";
if($testConnection->close()) {
   echo "<p>WORK!! close</p>";
} else
   echo "<p>DONT WORK!! close</p>";

?>

</body>
</html>