<?php

	if(isset($_REQUEST['editPostBtn'])){

		include 'dbconnect.php';

		$post_id = $_REQUEST['post_id'];

	  $post_details = ($_REQUEST['post_details']);
	  $post_price = ($_REQUEST['post_price']);
	  $post_address = ($_REQUEST['post_address']);
	  $post_bed = ($_REQUEST['post_bed']);
	  $post_bath = ($_REQUEST['post_bath']);
	  $post_area = ($_REQUEST['post_area']);

      $sql = "UPDATE tbl_userposts SET
			$post_details = '$post_details',
			$post_price = '$post_price',
			$post_address = '$post_address',
			$post_bed = '$post_bed',
			$post_bath = '$post_bath',
			$post_area = '$post_area'
			WHERE post_id = $post_id";
			$result = mysqli_query($dbcon, $sql);

		}



?>
