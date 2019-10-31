<?php

include 'dbconnect.php';

if (isset($_REQUEST['submitpost'])) {

  $post_id = ($_REQUEST['post_id']);
  $post_type = mysqli_real_escape_string($dbcon, $_REQUEST['post_type']);
  $property_type = mysqli_real_escape_string($dbcon, $_REQUEST['property_type']);
  $post_details = mysqli_real_escape_string($dbcon, $_REQUEST['post_details']);
  $post_address = mysqli_real_escape_string($dbcon, $_REQUEST['post_address']);
  $post_bed = mysqli_real_escape_string($dbcon, $_REQUEST['post_bed']);
  $post_bath = mysqli_real_escape_string($dbcon, $_REQUEST['post_bath']);
  $post_area = mysqli_real_escape_string($dbcon, $_REQUEST['post_area']);
  $post_price = mysqli_real_escape_string($dbcon, $_REQUEST['post_price']);



  // $fileimg = $_FILES['fileimg'];
  // $filenameimg = $_FILES['fileimg']['name'];
  // $filetempnameimg = $_FILES['fileimg']['tmp_name'];
  // $filesizeimg = $_FILES['fileimg']['size'];
  // $fileerrorimg = $_FILES['fileimg']['error'];
  // $filetypeimg = $_FILES['fileimg']['type'];
  //
  // $fileextimg = explode('.', $filenameimg);
  //
  // $fileactualextimg = strtolower(end($fileextimg));
  // $fileactualnameimg = strtolower(reset($fileextimg));
  //
  // $allowedimg = array('jpg', 'jpeg', 'png', 'gif');
  //
  // if (in_array($fileactualextimg, $allowedimg)) {
  //
  //   if ($fileerrorimg === 0) {
  //
  //     if ($filesizeimg < 10000000) {
  //
  //       $sql = "SELECT * FROM tbl_userposts";
  //
  //       $result = mysqli_query($dbcon, $sql);
  //       $resultCheck = mysqli_num_rows($result);
  //
  //       $filenamenewimg = $id . "Photo" . $fileactualnameimg . "." . $fileactualextimg;
  //       $filedestinationimg = 'uploads/'.$filenamenewimg;
  //       move_uploaded_file($filetempnameimg, $filedestinationimg);

  $sql = "INSERT INTO tbl_userposts (user_id, post_type, property_type, post_details, post_address, post_bed, post_bath, post_area, post_price, post_cover)
  VALUES ('$id', '$post_type', '$property_type', '$post_details', '$post_address', '$post_bed', '$post_bath', '$post_area', '$post_price' ,'123')";
  mysqli_query ($dbcon, $sql);
  $post_id = mysqli_insert_id($dbcon);



  extract($_POST);
  $error=array();
  $txtGalleryName="";
  $extension=array("jpeg","jpg","png","gif", "mp4", "flv", "wmv", "mov", "avi", "docx", "pdf");

  foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {

    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    mkdir("uploads/".$id."/".$post_id."/".$txtGalleryName, 0777, true);

    if(in_array($ext,$extension)) {

      if(!file_exists("uploads/".$id."/".$post_id."/".$txtGalleryName."/".$file_name)) {

          move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$id."/".$post_id."/".$txtGalleryName."/".$file_name);

          $sql = "INSERT INTO tbl_uploads (post_id, image)
          VALUES ('$post_id', '$file_name')";
          mysqli_query ($dbcon, $sql);

      } else {
        $filename=basename($file_name,$ext);
        $newFileName=$filename.time().".".$ext;
        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$id."/".$post_id."/".$txtGalleryName."/".$newFileName);

        $sql = "INSERT INTO tbl_uploads (post_id, image)
        VALUES ('$post_id', '$file_name')";
        mysqli_query ($dbcon, $sql);
      }

    } else {
        array_push($error,"$file_name, ");
    }

  }


        header('location: ' . "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

  //     } else {
  //       echo "<script>window.alert('File too Big');</script>";
  //     }
  //
  //   } else {
  //     echo "<script>window.alert('Error uploading File');</script>";
  //   }
  //
  // } else {
  //   echo "<script>window.alert('File type not allowed');</script>";
  // }


}
