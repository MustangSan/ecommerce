<?php
include("database/database.php");

$testConnection = new Database();

if($testConnection->connect()){
   echo "WORK!!";
} else
   echo "DONT WORK!!";
   

?>