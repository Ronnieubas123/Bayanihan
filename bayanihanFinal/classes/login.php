<?php 
if(isset($_REQUEST['login'])){
	session_start();
	$usernames = $_REQUEST['username'];
	$passwords = $_REQUEST['password'];
	include"../../connection/db_connection.php";

	$sql = $dbCon -> prepare( "SELECT * FROM tbl_user WHERE email = '$usernames' and password = '$passwords'");
	$sql -> execute();
	$result= $sql -> fetch();
	$db_username = $result['email'];	
	$db_password = $result['password'];
	$id = $result['id'];

	if($usernames == $db_username && $passwords == $db_password){
		$_SESSION['id'] = $id;
		header("location:../post/");
	}else{
		?>
		<script>
			alert("Username or password incorrect");
		</script>
		<?php
	}



}

 ?>