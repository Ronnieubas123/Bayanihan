<?php

$id = $_SESSION['u_id'];

if (isset($_REQUEST['submit1'])) {

  include 'dbconnect.php';

  $filepp = $_FILES['filepp'];
  $filecover = $_FILES['filecover'];

  $filenamepp = $_FILES['filepp']['name'];
  $filetempnamepp = $_FILES['filepp']['tmp_name'];
  $filesizepp = $_FILES['filepp']['size'];
  $fileerrorpp = $_FILES['filepp']['error'];
  $filetypepp = $_FILES['filepp']['type'];
  $filenamecover = $_FILES['filecover']['name'];
  $filetempnamecover = $_FILES['filecover']['tmp_name'];
  $filesizecover = $_FILES['filecover']['size'];
  $fileerrorcover = $_FILES['filecover']['error'];
  $filetypecover = $_FILES['filecover']['type'];

  $fileextpp = explode('.', $filenamepp);
  $fileextcover = explode('.', $filenamecover);

  $fileactualextpp = strtolower(end($fileextpp));
  $fileactualextcover = strtolower(end($fileextcover));

  $allowedpp = array('jpg', 'jpeg', 'png', 'gif', '');
  $allowedcover = array('jpg', 'jpeg', 'png', 'gif', '');

  if (in_array($fileactualextpp, $allowedpp) && in_array($fileactualextcover, $allowedcover)) {

    if ($fileerrorpp === 0 && $fileerrorcover === 0) {

      if ($filesizepp < 10000000 && $filesizecover < 10000000) {

        $filenamenewpp = "profile".$id.".".$fileactualextpp;
        $filedestinationpp = 'uploads/'.$filenamenewpp;
        move_uploaded_file($filetempnamepp, $filedestinationpp);
        $filenamenewcover = "cover".$id.".".$fileactualextcover;
        $filedestinationcover = 'uploads/'.$filenamenewcover;
        move_uploaded_file($filetempnamecover, $filedestinationcover);

        $sql = "UPDATE tbl_users SET user_pp_status = 1, user_pp = '$filenamenewpp', user_cover_status = 1, user_cover = '$filenamenewcover' WHERE id='$id'";

      //  $sql = "INSERT INTO tbl_users (user_pp_status, user_pp)

        $result = mysqli_query($dbcon, $sql);

        header('location:profile.php');

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

if (isset($_REQUEST['submit2'])) {
  $sql = "UPDATE tbl_users SET user_pp_status = 0, user_pp = '', user_cover_status = 0, user_cover = '' WHERE id='$id'";

//  $sql = "INSERT INTO tbl_users (user_pp_status, user_pp)

  $result = mysqli_query($dbcon, $sql);

  header('location:profile.php');
}

 ?>
