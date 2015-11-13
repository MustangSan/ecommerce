<?php

$db_config["host"] = "localhost";
$db_config["username"] = "root";
$db_config["password"] = "";
$db_config["dbname"] = "ecommerce_bd";
$db_config["port"] = NULL;
$db_config["socket"] = NULL;

$db_connect = mysqli_connect($db_config["host"], $db_config["username"], $db_config["password"], $db_config["dbname"]);
if(mysqli_connect_errno()) {
	echo mysqli_connect_error();
	exit();
} else {
	echo "Conexao feita com sucesso!";
}

?>