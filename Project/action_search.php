<?php
	include_once 'includes/start.php';

	$destination = $_GET['destination'];
	$guests = $_GET['guests'];
	
	$destination = trim(htmlspecialchars($destination));
	$guests = trim(htmlspecialchars($guests));

	if(empty($guests)) $guests = 1;

	$checkoutDate;
	$checkinDate;
	$checkin;
	$checkout;

	if(validateDate( $_GET['checkout'],'Y-m-d')) $checkoutDate = new DateTime($_GET['checkout']);
	
	if(validateDate( $_GET['checkin'],'Y-m-d'))	$checkinDate = new DateTime($_GET['checkin']);
	
	if(isset($checkinDate) && isset($checkoutDate)){
		if($checkinDate > $checkoutDate){
			$checkin = $_GET['checkout'];
			$checkout = $_GET['checkin'];
		}else{		
			$checkin = $_GET['checkin'];
			$checkout = $_GET['checkout'];
		}
	} else{
		if(isset($checkinDate)) $checkin = $_GET['checkin']; else $checkin = "";
		if(isset($checkoutDate)) $checkout = $_GET['checkout']; else $checkout = "";
	}

    header('Location: main_page.php?destination='.$destination.'&checkin='.$checkin.'&checkout='.$checkout.'&guests='.$guests);

?>
