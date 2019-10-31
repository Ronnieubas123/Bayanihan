<?php
try {
  $host = 'localhost';
  $dbName = 'bayanihan';
  $username = 'root';
  $password = '';

$dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password);

$dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbCon->exec("SET CHARACTER SET utf8");

}catch(PDOException $err){	
	print_r($err);
}
?>