<?php

	if(isset($_REQUEST['updateName'])){

		include 'dbconnect.php';

	  $user_fname = ($_REQUEST['user_fname']);
	  $user_mname = ($_REQUEST['user_mname']);
	  $user_lname = ($_REQUEST['user_lname']);
	  $confirmPassword = ($_REQUEST['confirmPassword']);

		$sql = "SELECT * FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);

    $hashedConfirmPassword = md5($confirmPassword);

		if ($hashedConfirmPassword == $row['user_password']) {

      $sql = "UPDATE tbl_users SET
			user_fname = '$user_fname',
			user_mname = '$user_mname',
			user_lname = '$user_lname'
			WHERE id = $id";
			$result = mysqli_query($dbcon, $sql);
			header('location:settings.php');
			echo "<script>window.alert('Account Settings Updated');</script>";

		} else {
			echo "<script>window.alert('Password incorrect');</script>";
		}

	}



	if(isset($_REQUEST['updateEmail'])){

		include 'dbconnect.php';

	  $user_email = ($_REQUEST['user_email']);
	  $user_email2 = ($_REQUEST['user_email2']);
	  $confirmPassword = ($_REQUEST['confirmPassword']);

		$sql = "SELECT * FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);

    $hashedConfirmPassword = md5($confirmPassword);

		if ($hashedConfirmPassword == $row['user_password']) {

      $sql = "UPDATE tbl_users SET
			user_email = '$user_email',
			user_email2 = '$user_email2'
			WHERE id = $id";
			$result = mysqli_query($dbcon, $sql);
			header('location:settings.php');
			echo "<script>window.alert('Account Settings Updated');</script>";

		} else {
			echo "<script>window.alert('Password incorrect');</script>";
		}

	}



	if(isset($_REQUEST['updatePassword'])){

		include 'dbconnect.php';

	  $currentPass = ($_REQUEST['currentPass']);
	  $newPass = ($_REQUEST['newPass']);
	  $confirmNewPass = ($_REQUEST['confirmNewPass']);

		$sql = "SELECT * FROM tbl_users WHERE id = '$id'";
    $result = mysqli_query($dbcon, $sql);
    $row = mysqli_fetch_assoc($result);

		$hashedCurrentPass = md5($currentPass);

		if ($hashedCurrentPass == $row['user_password']) {

			if ($newPass == $confirmNewPass) {

				echo "<script>window.alert('Log-in with your New Password');</script>";

				$hashedNewPass = md5($newPass);

				$sql = "UPDATE tbl_users SET
				user_password = '$hashedNewPass'
				WHERE id = $id";
				$result = mysqli_query($dbcon, $sql);

		    session_unset();
		    session_destroy();

		    header('location: index.php');

			} else {
				echo "<script>window.alert('New Passwords did not matched');</script>";
			}

		} else {
			echo "<script>window.alert('Incorrect Password');</script>";
		}

	}

?>
