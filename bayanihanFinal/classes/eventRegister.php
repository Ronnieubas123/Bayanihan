<?php 
if(isset($_POST)){
	include"../connection/db_connection.php";

	$eventID = $_POST['eventID'];
	$userID = $_POST['userID'];



$sql_user = $dbCon -> prepare( "SELECT * FROM tbl_user WHERE id = '$userID'" );
$sql_user -> execute();
$result_user = $sql_user -> fetch();
$firstname = $result_user['firstname'];
$lastname = $result_user['lastname'];
$gmail = $result_user['email'];
$Organization=$result_user['Organization'];
$Career=$result_user['Career'];


	$sql = "INSERT INTO tbl_registerevent VALUES(0,'$eventID','$firstname','$lastname','$gmail','$Organization','$Career')";
    $dbCon->exec($sql);
}

 ?>