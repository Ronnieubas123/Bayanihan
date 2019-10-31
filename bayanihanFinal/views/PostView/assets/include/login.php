<?php

  if(isset($_POST['login'])) {

    include 'dbconnect.php';

    $user_email = mysqli_real_escape_string($dbcon, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($dbcon, $_POST['user_password']);

    $sql = "SELECT * FROM tbl_users WHERE user_email = '$user_email'";
    $result = mysqli_query($dbcon, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
      echo "<script>
      window.alert('Invalid Credentials');
      </script>";

    }

    else {
      if ($row = mysqli_fetch_assoc($result)){

        $hashedpassword = md5($user_password);

        if($hashedpassword == $row['user_password']){
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_fname'] = $row['user_fname'];
            $_SESSION['u_lname'] = $row['user_lname'];
            $_SESSION['seller_type'] = $row['seller_type'];
            $GLOBALS['current_userid'] = $_SESSION['u_id'];
            $_SESSION['company_name'] = $row['company_name'];

            if ($row['id'] == 1) {
              header('location:admin.php');
            } else {
              header('location: ' . "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            }
            
        }

        else {
          echo "<script>
          window.alert('Password Incorrect');
          </script>";
        }
      }
    }
  }

?>
