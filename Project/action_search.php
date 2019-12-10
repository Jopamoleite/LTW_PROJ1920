<?
    include_once 'includes/start.php';

	$destination = $_GET['destination'];
	$checkin = $_GET['checkin'];
	$checkout = $_GET['checkout'];
	$guests = $_GET['guests'];
    
    $destination = trim(htmlspecialchars($destination));

    header('Location: main_page.php?destination='.$destination.'&checkin='.$checkin.'&checkout='.$checkout.'&guests='.$guests);

?>
