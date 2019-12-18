<?php
  chdir('..');

  include_once 'includes/start.php';
  include_once 'database/houses.php';

  if($_POST)
    if($_POST['houseID']){
      $houseID = $_POST['houseID'];
      $photo = getHousePhotos($houseID);
      if ($photo['image_name'] != "default_house.jpg") {
        unlink("images/" . $photo['image_name']);
      }

      removeHouse(intval($houseID));
    }

  header("Location: ../pages/main_page.php");
?>
