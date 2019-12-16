<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/houses.php';
include_once 'database/user.php';

$extensions = ['jpeg', 'jpg', 'png', 'jfif'];

$fileName = $_FILES['picture']['name'];
$fileSize = $_FILES['picture']['size'];
$fileTmpName = $_FILES['picture']['tmp_name'];
$tmp = explode('.', $fileName);
$fileExtension = strtolower(end($tmp));

$addPhoto = false;

if (isset($_POST['submit']) && !empty($fileName)) {

    if (!in_array($fileExtension, $extensions)) {
        $_SESSION['infomsg'] = "Please upload a jpeg or png file ";
        header('Location: ../pages/add_houses.php');
        die();
    }

    if ($fileSize > 3000000) {
        $_SESSION['infomsg'] = "Please upload a file with less than 3MB";
        header('Location: ../pages/add_houses.php');
        die();
    }

    $currentDate = date("Y-m-d");
    $randomNumber = rand();

    $newName = sha1($_SESSION['userID'] . $currentDate . $randomNumber) . "." . $fileExtension;

    $uploadPath = "images/" . $newName;

    $uploadSuccess = move_uploaded_file($fileTmpName, $uploadPath);

    if (!$uploadSuccess) {
        $_SESSION['infomsg'] = "Error uploading file!";
        header('Location: ../pages/add_houses.php');
        die();
    } else {
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

if ($addPhoto) {
    addPhotoToHouse($newName, $placeID);
}

header('Location: ../pages/user_profile.php?user=' . $_SESSION['username']);