<?php
include"../../connection/db_connection.php";
if(isset($_REQUEST['freebtn'])){
	$freebtn = $_REQUEST['freebtn'];
	$programs = $_REQUEST['programs'];
	$comments = $_REQUEST['comments'];
	$venue = $_REQUEST['venue'];
	$contactnumber = $_REQUEST['contactnumber'];
	$title = $_REQUEST['title'];
	$date = $_REQUEST['date'];

	date_default_timezone_set('Asia/Manila');
     $datePosted=date('F/j/y h:i');echo "<br>";
     $date = date('F/j/y h:i');


	$sql_check = $dbCon -> prepare( "SELECT * FROM tbl_category WHERE category = '$freebtn'" );
	$sql_check -> execute();
	$resultCheckStudent= $sql_check -> fetch();
	$categoryID = $resultCheckStudent['id'];

	
	$sql = "INSERT INTO tbl_event VALUES(0,'$categoryID','$programs','$comments','$venue','$contactnumber','$id','$title','$date','$datePosted')";
    $dbCon->exec($sql);


    $sql_eventID = $dbCon -> prepare( "SELECT * FROM tbl_event ORDER BY id desc" );
	$sql_eventID -> execute();
	$result_eventID= $sql_eventID -> fetch();
	$eventID = $result_eventID['id'];


     // MULTIPLE UPLOAD IMAGES 
        extract($_POST);
    $error=array();
    $txtGalleryName ="";
    $count = 0;
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["imgs"]["tmp_name"] as $key=>$tmp_name)
            {
                $count++;
                $file_name=$_FILES["imgs"]["name"][$key];       
                $file_tmp=$_FILES["imgs"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))       
                {
                    if(!file_exists("C:/xampp/htdocs/bayanihanFinal/assets/img/".$txtGalleryName."/".$file_name))
                    {
                        /*move_uploaded_file($file_tmp=$_FILES["imgs"]["tmp_name"][$key],"QRimg/".."/".$file_name); */
                        move_uploaded_file($file_tmp,"C:/xampp/htdocs/bayanihanFinal/assets/img/".$file_name);   

                            try {   
                                      $sql = "INSERT INTO tbl_eventimg VALUES(0,'$eventID','$file_name')";
                                      
                                        $dbCon->exec($sql);
                                        ?>
                                        <script>alert("Success"); </script>
                                        <?php
                                        }
                                    catch(PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }

               /*
                $insertMultipleImg=mysql_query("INSERT INTO equipmentimage VALUES(0,'$str','$file_name')");
                        if($insertMultipleImg){
                        }else{
                            echo"Error";
                        }*/
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp,"C:/xampp/htdocs/bayanihanFinal/assets/img/".$file_name);   

                        
               
                                   try {   
                                      $sql = "INSERT INTO tbl_eventimg VALUES(0,'$eventID','$file_name')";
                                      
                                        $dbCon->exec($sql);
                                        ?>
                                        <script>alert("Success"); </script>
                                        <?php
                                        }
                                    catch(PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }

            //CLOSING



}else if(isset($_REQUEST['standard'])){
    $standard = $_REQUEST['standard'];
    $programs = $_REQUEST['programs'];
    $comments = $_REQUEST['comments'];
    $venue = $_REQUEST['venue'];
    $contactnumber = $_REQUEST['contactnumber'];
    $title = $_REQUEST['title'];
    $date = $_REQUEST['date'];

    date_default_timezone_set('Asia/Manila');
     $datePosted=date('F/j/y h:i');echo "<br>";
     $date = date('F/j/y h:i');


    $sql_check = $dbCon -> prepare( "SELECT * FROM tbl_category WHERE category = '$standard'" );
    $sql_check -> execute();
    $resultCheckStudent= $sql_check -> fetch();
    $categoryID = $resultCheckStudent['id'];

    
    $sql = "INSERT INTO tbl_event VALUES(0,'$categoryID','$programs','$comments','$venue','$contactnumber','$id','$title','$date','$datePosted')";
    $dbCon->exec($sql);


    $sql_eventID = $dbCon -> prepare( "SELECT * FROM tbl_event ORDER BY id desc" );
    $sql_eventID -> execute();
    $result_eventID= $sql_eventID -> fetch();
    $eventID = $result_eventID['id'];


     // MULTIPLE UPLOAD IMAGES 
        extract($_POST);
    $error=array();
    $txtGalleryName ="";
    $count = 0;
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["imgs"]["tmp_name"] as $key=>$tmp_name)
            {
                $count++;
                $file_name=$_FILES["imgs"]["name"][$key];       
                $file_tmp=$_FILES["imgs"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))       
                {
                    if(!file_exists("C:/xampp/htdocs/bayanihanFinal/assets/img/".$txtGalleryName."/".$file_name))
                    {
                        /*move_uploaded_file($file_tmp=$_FILES["imgs"]["tmp_name"][$key],"QRimg/".."/".$file_name); */
                        move_uploaded_file($file_tmp,"C:/xampp/htdocs/bayanihanFinal/assets/img/".$file_name);   

                            try {   
                                      $sql = "INSERT INTO tbl_eventimg VALUES(0,'$eventID','$file_name')";
                                      
                                        $dbCon->exec($sql);
                                        ?>
                                        <script>alert("Success"); </script>
                                        <?php
                                        }
                                    catch(PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }

               /*
                $insertMultipleImg=mysql_query("INSERT INTO equipmentimage VALUES(0,'$str','$file_name')");
                        if($insertMultipleImg){
                        }else{
                            echo"Error";
                        }*/
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp,"C:/xampp/htdocs/bayanihanFinal/assets/img/".$file_name);   

                        
               
                                   try {   
                                      $sql = "INSERT INTO tbl_eventimg VALUES(0,'$eventID','$file_name')";
                                      
                                        $dbCon->exec($sql);
                                        ?>
                                        <script>alert("Success"); </script>
                                        <?php
                                        }
                                    catch(PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
}else if(isset($_REQUEST['PREMIUM'])){
    $PREMIUM = $_REQUEST['PREMIUM'];
    $programs = $_REQUEST['programs'];
    $comments = $_REQUEST['comments'];
    $venue = $_REQUEST['venue'];
    $contactnumber = $_REQUEST['contactnumber'];
    $title = $_REQUEST['title'];
    $date = $_REQUEST['date'];

    date_default_timezone_set('Asia/Manila');
     $datePosted=date('F/j/y h:i');echo "<br>";
     $date = date('F/j/y h:i');


    $sql_check = $dbCon -> prepare( "SELECT * FROM tbl_category WHERE category = '$PREMIUM'" );
    $sql_check -> execute();
    $resultCheckStudent= $sql_check -> fetch();
    $categoryID = $resultCheckStudent['id'];

    
    $sql = "INSERT INTO tbl_event VALUES(0,'$categoryID','$programs','$comments','$venue','$contactnumber','$id','$title','$date','$datePosted')";
    $dbCon->exec($sql);


    $sql_eventID = $dbCon -> prepare( "SELECT * FROM tbl_event ORDER BY id desc" );
    $sql_eventID -> execute();
    $result_eventID= $sql_eventID -> fetch();
    $eventID = $result_eventID['id'];


     // MULTIPLE UPLOAD IMAGES 
        extract($_POST);
    $error=array();
    $txtGalleryName ="";
    $count = 0;
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["imgs"]["tmp_name"] as $key=>$tmp_name)
            {
                $count++;
                $file_name=$_FILES["imgs"]["name"][$key];       
                $file_tmp=$_FILES["imgs"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))       
                {
                    if(!file_exists("C:/xampp/htdocs/bayanihanFinal/assets/img/".$txtGalleryName."/".$file_name))
                    {
                        /*move_uploaded_file($file_tmp=$_FILES["imgs"]["tmp_name"][$key],"QRimg/".."/".$file_name); */
                        move_uploaded_file($file_tmp,"C:/xampp/htdocs/bayanihanFinal/assets/img/".$file_name);   

                            try {   
                                      $sql = "INSERT INTO tbl_eventimg VALUES(0,'$eventID','$file_name')";
                                      
                                        $dbCon->exec($sql);
                                        ?>
                                        <script>alert("Success"); </script>
                                        <?php
                                        }
                                    catch(PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }

               /*
                $insertMultipleImg=mysql_query("INSERT INTO equipmentimage VALUES(0,'$str','$file_name')");
                        if($insertMultipleImg){
                        }else{
                            echo"Error";
                        }*/
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp,"C:/xampp/htdocs/bayanihanFinal/assets/img/".$file_name);   

                        
               
                                   try {   
                                      $sql = "INSERT INTO tbl_eventimg VALUES(0,'$eventID','$file_name')";
                                      
                                        $dbCon->exec($sql);
                                        ?>
                                        <script>alert("Success"); </script>
                                        <?php
                                        }
                                    catch(PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
}

 ?>