<?php 

include"../connection/db_connection.php";

$exampleFirstName = $_POST['exampleFirstName'];
$exampleLastName = $_POST['exampleLastName'];
$exampleInputEmail = $_POST['exampleInputEmail'];
$exampleInputPassword = $_POST['exampleInputPassword'];
$exampleRepeatPassword = $_POST['exampleRepeatPassword'];
$Organization = $_POST['Organization'];
$Career = $_POST['Career'];

$exampleInputCompanyName = $_POST['exampleInputCompanyName'];
$status = $_POST['status'];

if ($status=="Company") {

	$Organization=$exampleInputCompanyName;
	$Career="Profesional";
}
else{
	$Organization;
	$Career;
}



$sql = "INSERT INTO tbl_user VALUES(0,'$exampleFirstName','$exampleLastName','$exampleInputCompanyName','$exampleInputEmail','$exampleInputPassword','$status','None','$Organization','$Career')";
$dbCon->exec($sql);




 ?>