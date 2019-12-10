<?
    include_once 'includes/start.php';
    include_once 'database/houses.php';

	$title = $_POST['title'];
	$address = $_POST['address'];
	$price = $_POST['price'];
	$capacity = $_POST['capacity'];
    $description = $_POST['description'];
    
    $title = trim(htmlspecialchars($title));
    $address = trim(htmlspecialchars($address));
    $price = trim(htmlspecialchars($price));
    $capacity = trim(htmlspecialchars($capacity));
    $description = trim(htmlspecialchars($description));

    addHouse($title, $address, $price, $capacity, $description, $_SESSION['userID']);

    header('Location: user_profile.php?user='.$_SESSION['username']);

?>
