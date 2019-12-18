<?php
  chdir('..');

  include_once 'includes/start.php';
  include_once 'database/houses.php';

  $extensions = ['jpeg', 'jpg', 'png', 'jfif'];

  error_log(var_dump($_POST));

  $houseID = $_POST['houseID'];
  $fileName = $_FILES['picture']['name'];
  $fileSize = $_FILES['picture']['size'];
  $fileTmpName = $_FILES['picture']['tmp_name'];
  $tmp = explode('.', $fileName);
  $fileExtension = strtolower(end($tmp));

  if (!in_array($fileExtension, $extensions)) {
    $_SESSION['errormsg'] = "Please upload a jpeg or png file ";
    header('Location: ../pages/house_page.php?house=' . $houseID);
    die();
  }

  if ($fileSize > 3000000) {
    $_SESSION['errormsg'] = "Please upload a file with less than 3MB";
    header('Location: ../pages/house_page.php?house=' . $houseID);
    die();
  }

  $currentDate = date("Y-m-d");
  $randomNumber = rand();
  $newName = sha1($houseID . $currentDate . $randomNumber) . "." . $fileExtension;
  $uploadPath = "images/" . $newName;
  $uploadSuccess = move_uploaded_file($fileTmpName, $uploadPath);

  if (!$uploadSuccess) {
    $_SESSION['errormsg'] = "Error uploading file! ";
  } else {
    $old_photo = getHousePhotos($houseID)['image_name'];
    addPhotoToHouse($newName, $houseID);
    if ($old_photo != "default_house.jpg") {
      unlink("images/" . $old_photo);
    }
  }

  header('Location: ../pages/house_page.php?house=' . $houseID);
?>
