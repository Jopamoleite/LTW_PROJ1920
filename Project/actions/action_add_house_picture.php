<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/user.php';

$extensions = ['jpeg', 'jpg', 'png', 'jfif'];

$fileName = $_FILES['picture']['name'];
$fileSize = $_FILES['picture']['size'];
$fileTmpName = $_FILES['picture']['tmp_name'];
$fileExtension = strtolower(end(explode('.', $fileName)));

if (isset($_POST['submit'])) {

 if (!in_array($fileExtension, $extensions)) {
  $_SESSION['infomsg'] = "Please upload a jpeg or png file ";
  header('Location: user_profile.php?user=' . $_SESSION['username']);
  die();
 }

 if ($fileSize > 3000000) {
  $_SESSION['infomsg'] = "Please upload a file with less than 3MB";
  header('Location: user_profile.php?user=' . $_SESSION['username']);
  die();
 }

 $currentDate = date("Y-m-d");
 $randomNumber = rand();

 $newName = sha1($_SESSION['userID'] . $currentDate . $randomNumber) . "." . $fileExtension;

 $uploadPath = "images/" . $newName;

 $uploadSuccess = move_uploaded_file($fileTmpName, $uploadPath);

 if (!$uploadSuccess) {
  $_SESSION['infomsg'] = "Error uploading file!";
 } else {
  editPhoto($_SESSION['userID'], $newName);
 }

}

header('Location: user_profile.php?user=' . $_SESSION['username']);
