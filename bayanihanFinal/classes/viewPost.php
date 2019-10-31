 <?php 
 include"../../connection/db_connection.php";
$count = 0;
$sql_event="SELECT * FROM tbl_event ORDER BY id desc LIMIT 6";
$query_event = $dbCon->query($sql_event);
foreach ($query_event as $data_event){
    $eventID = $data_event['id'];
    $categoryID = $data_event['categoryID'];

$sql_img = $dbCon -> prepare( "SELECT * FROM tbl_eventimg WHERE eventID = '$eventID'" );
$sql_img -> execute();
$result_img = $sql_img -> fetch();

$sql_category = $dbCon -> prepare( "SELECT * FROM tbl_category WHERE id = '$categoryID'" );
$sql_category -> execute();
$result_ctegory = $sql_category -> fetch();

$sql_registerEvent = $dbCon -> prepare( "SELECT * FROM tbl_registerevent WHERE eventID = '$eventID'" );
$sql_registerEvent -> execute();
$result_registerEvent = $sql_registerEvent -> fetch();
$eventIDs = $result_registerEvent['eventID'];

if($eventID == $eventIDs){
    $count++;
}

?>
 <div class="col-lg-4 col-md-6">
                    <div class="blog-box" id="viewP" data="<?php echo $data_event['id']; ?>">
                        <div class="blog-img-box">
                            <img src="../../assets/img/<?php echo $result_img['img']; ?>" alt="" class="img-fluid blog-img">
                        </div>
                        <div class="single-blog">
                            <div class="blog-content">
                                <a href="viewpost.php">
                                    <h3 class="card-title"><?php echo $data_event['title']; ?></h3>
                                </a>
                                <h6> 17 October 2018</h6>
                                <h6><?php echo $count; ?>/<?php echo $result_ctegory['Volunteers']; ?></h6>
                                    
                        </div>
                        </div>
                    </div>
                </div>
<?php

$count = 0;
}

  ?>


