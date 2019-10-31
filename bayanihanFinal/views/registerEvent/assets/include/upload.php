<?php

$id = $_SESSION['u_id'];

if (isset($_REQUEST['submitpp'])) {

  include 'dbconnect.php';

  $filepp = $_FILES['filepp'];

  $filenamepp = $_FILES['filepp']['name'];
  $filetempnamepp = $_FILES['filepp']['tmp_name'];
  $filesizepp = $_FILES['filepp']['size'];
  $fileerrorpp = $_FILES['filepp']['error'];
  $filetypepp = $_FILES['filepp']['type'];

  $fileextpp = explode('.', $filenamepp);

  $fileactualextpp = strtolower(end($fileextpp));

  $allowedpp = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array($fileactualextpp, $allowedpp)) {

    if ($fileerrorpp === 0) {

      if ($filesizepp < 10000000) {

        $filenamenewpp = "profile".$id.".".$fileactualextpp;
        $filedestinationpp = 'uploads/'.$filenamenewpp;
        move_uploaded_file($filetempnamepp, $filedestinationpp);

        $sql = "UPDATE tbl_users SET user_pp_status = 1, user_pp = '$filenamenewpp' WHERE id='$id'";

      //  $sql = "INSERT INTO tbl_users (user_pp_status, user_pp)

        $result = mysqli_query($dbcon, $sql);
      } else {
        echo "<script>window.alert('File too Big');</script>";
      }

    } else {
      echo "<script>window.alert('Error uploading File');</script>";
    }

  } else {
    echo "<script>window.alert('File type not allowed');</script>";
  }

}

if (isset($_REQUEST['submitcover'])) {

  include 'dbconnect.php';

  $filecover = $_FILES['filecover'];

  $filenamecover = $_FILES['filecover']['name'];
  $filetempnamecover = $_FILES['filecover']['tmp_name'];
  $filesizecover = $_FILES['filecover']['size'];
  $fileerrorcover = $_FILES['filecover']['error'];
  $filetypecover = $_FILES['filecover']['type'];

  $fileextcover = explode('.', $filenamecover);

  $fileactualextcover = strtolower(end($fileextcover));

  $allowedcover = array('jpg', 'jpeg', 'png', 'gif');

  if (in_array($fileactualextcover, $allowedcover)) {

    if ($fileerrorcover === 0) {

      if ($filesizecover < 10000000) {

        $filenamenewcover = "cover".$id.".".$fileactualextcover;
        $filedestinationcover = 'uploads/'.$filenamenewcover;
        move_uploaded_file($filetempnamecover, $filedestinationcover);

        $sql = "UPDATE tbl_users SET user_cover_status = 1, user_cover = '$filenamenewcover' WHERE id='$id'";

      //  $sql = "INSERT INTO tbl_users (user_pp_status, user_pp)

        $result = mysqli_query($dbcon, $sql);
      } else {
        echo "<script>window.alert('File too Big');</script>";
      }

    } else {
      echo "<script>window.alert('Error uploading File');</script>";
    }

  } else {
    echo "<script>window.alert('File type not allowed');</script>";
  }

}

 ?>
