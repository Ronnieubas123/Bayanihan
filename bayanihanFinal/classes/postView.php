<?php 
include"../../connection/db_connection.php";

$sql_event="SELECT *  FROM tbl_event WHERE userID ='$id' ORDER BY id desc";
	$query_event = $dbCon->query($sql_event);
	foreach ($query_event as $data_event){
		$eventID = $data_event['id'];
		$dates = $data_event['date'];

	$sql_img = $dbCon -> prepare( "SELECT * FROM tbl_eventimg WHERE eventID = '$eventID'" );
    $sql_img -> execute();
    $result_img= $sql_img -> fetch();

    date_default_timezone_set('Asia/Manila');
     $dates=date('j F Y');

		?>
		<div class="col-md-12">
			<div style="height: auto; padding: 20px 10px; border: 1px solid #ccc; margin-top: 10px; border-radius: 5px;" id="showPost" data="<?php echo $data_event['id']; ?>">
			<div style="height: 500px;">
				<h3 style="color: #000;"><?php echo $data_event['title']; ?></h3>
				<h5><?php echo $data_event['datePosted']; ?></h5>

			<div style="height: 400px; width: 100%;">
			<img src="../../assets/img/<?php echo $result_img['img'];?>" style="height:100%; width: 100%; max-width: 100%; object-fit: cover; object-position: center;">
			</div>

			</div>
			</div>
		</div>
		<?php

	}


 ?>