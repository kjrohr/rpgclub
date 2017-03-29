<?php
// $host = "localhost";
 $user = "root";
 $password = "Poodles";
// $database = "rpgclub";
// mysql_connect($host,$user,$password);
// mysql_select_db($database);

$db = new PDO('mysql:host=localhost;dbname=rpgclub',$user,$password);
?>
