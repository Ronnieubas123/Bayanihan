<?php
	$count = 0;
	$totalvalue = 0;
	$star = "SELECT * FROM tbl_userrating WHERE seller_id = '$id'";
		$datastar = mysqli_query($dbcon, $star);
		while ($datarow = mysqli_fetch_assoc($datastar)){
			$count++;
			 $ratevalue= $datarow['seller_rate'];


			if($ratevalue == 5){
				$ratevalue = 100;
			}else if ($ratevalue == 4){
				$ratevalue = 80;
			}else if ($ratevalue == 3){
				$ratevalue =60;
			}else if ($ratevalue == 2){
				$ratevalue = 40;
			}else if ($ratevalue == 1){
				$ratevalue=20;
			}

		   $totalvalue = $totalvalue + $ratevalue;

		}
		 $count;
		  $totalvalue;
		$finaltotal = $totalvalue / $count;

?>

<div class="star-ratings-css">
  <div class="star-ratings-css-top" style="width: <?php echo $finaltotal."%"; ?>"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
  <div class="star-ratings-css-bottom"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
</div>
