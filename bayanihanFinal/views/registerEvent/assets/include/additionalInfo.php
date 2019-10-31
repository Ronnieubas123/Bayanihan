<?php

session_start();

  $id = $_SESSION['u_id'];

	if(isset($_REQUEST['additionalInfobtn'])){

		include 'dbconnect.php';

	  $user_fname = ($_REQUEST['user_fname']);
	  $user_mname = ($_REQUEST['user_mname']);
	  $user_fname = ($_REQUEST['user_fname']);
	  $user_email = ($_REQUEST['user_email']);
	  $user_email2 = ($_REQUEST['user_email2']);
	  $user_address1 = ($_REQUEST['user_address1']);
	  $user_address2 = ($_REQUEST['user_address2']);
	  $user_gender = ($_REQUEST['user_gender']);
	  $user_bday = ($_REQUEST['user_bday']);
	  $user_num1 = ($_REQUEST['user_num1']);
	  $user_num2 = ($_REQUEST['user_num2']);
	  $user_num3 = ($_REQUEST['user_num3']);

    $sql = "SELECT * FROM tbl_users WHERE user_email2 = '$user_email2'";
    $result = mysqli_query($dbcon, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

  /*  if ($resultCheck > 0) {

      echo "<script>window.alert('Secondary Email Already Taken');</script>";

    } else { */

      $sql = "UPDATE tbl_users SET
			user_fname = '$user_fname',
			user_mname = '$user_mname',
			user_fname = '$user_fname',
			user_email = '$user_email',
			user_email2 = '$user_email2',
			user_address1 = '$user_address1',
			user_address2 = '$user_address2',
			user_gender = '$user_gender',
			user_bday = '$user_bday',
			user_num1 = '$user_num1',
			user_num2 = '$user_num2',
			user_num3 = '$user_num3'
			WHERE id = $id";
			$result = mysqli_query($dbcon, $sql);

      header('location:welcomeUser2.php');

    /*}*/
  }

?>
