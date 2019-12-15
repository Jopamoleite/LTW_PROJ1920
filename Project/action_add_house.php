<?php
    include_once 'includes/start.php';
    include_once 'database/houses.php';
    include_once 'database/db_user.php';

    $extensions = ['jpeg','jpg','png', 'jfif'];

    $fileName = $_FILES['picture']['name'];
    $fileSize = $_FILES['picture']['size'];
    $fileTmpName  = $_FILES['picture']['tmp_name'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $addPhoto = false;

    if (isset($_POST['submit']) && !empty($fileName)) {

        if (!in_array($fileExtension,$extensions)) {
            $_SESSION['errormsg'] = "Please upload a jpeg or png file ";
            header('Location: add_houses.php');
            die();
        }

        if ($fileSize > 3000000) {
            $_SESSION['errormsg'] = "Please upload a file with less than 3MB";
            header('Location: add_houses.php');
            die();
        }

        $currentDate = date("Y-m-d");
        $randomNumber = rand();

        $newName = sha1($_SESSION['userID'] . $currentDate . $randomNumber) . "." . $fileExtension;

        $uploadPath = "images/" . $newName;

        $uploadSuccess = move_uploaded_file($fileTmpName, $uploadPath);

        if (!$uploadSuccess) {
            $_SESSION['errormsg'] = "Error uploading file!";
            header('Location: add_houses.php');
            die();
        }else{
            $addPhoto = true;
        }

    }

	$title = $_POST['title'];
	$location = $_POST['location'];
	$address = $_POST['address'];
	$price = $_POST['price'];
	$capacity = $_POST['capacity'];
    $description = $_POST['description'];

    $title = trim(htmlspecialchars($title));
    $location = trim(htmlspecialchars($location));
    $address = trim(htmlspecialchars($address));
    $price = trim(htmlspecialchars($price));
    $capacity = trim(htmlspecialchars($capacity));
    $description = trim(htmlspecialchars($description));

    $placeID = addHouse($title, $location, $address, $price, $capacity, $description, $_SESSION['userID']);

    if($addPhoto) addPhotoToHouse($newName, $placeID);

    header('Location: user_profile_page.php?user='.$_SESSION['username']);

?>
