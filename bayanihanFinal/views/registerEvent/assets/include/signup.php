<?php

    include 'dbconnect.php';

if (isset($_REQUEST['btnadd'])) {
  $fname = ($_REQUEST['fname']);
  $lname = ($_REQUEST['lname']);
  $email = ($_REQUEST['Email']);
  $Number = ($_REQUEST['Number']);
  $Organization = ($_REQUEST['Organization']);
  $Career = ($_REQUEST['Career']);



    $sql = "INSERT INTO tbl_volunteer ( fname, lname, email, cnumber, Organization, Career)
  VALUES ('$fname', '$lname', '$email', '$Number', '$Organization', '$Career')";
  $dbCon->query($sql);
} 


?>
