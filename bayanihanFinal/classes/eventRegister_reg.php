<?php 
if(isset($_POST)){
	include"../connection/db_connection.php";

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$eventID = $_POST['eventID'];
	$Email = $_POST['Email'];
	$Organization = $_POST['Organization'];
	$Career = $_POST['Career'];




	$sql = "INSERT INTO tbl_registerevent VALUES(0,'$eventID','$fname','$lname','$Email','$Organization','$Career')";
    $dbCon->exec($sql);
}

 ?>