<?php
  chdir('..');

  include_once 'includes/start.php';
  include_once 'database/houses.php';

  if($_POST)
    if($_POST['houseID']){
      $houseID = $_POST['houseID'];
      $photo = getHousePhotos($houseID)['image_name'];
      if ($photo != "default_house.jpg") {
        unlink("images/" . $photo);
      }

      removeHouse(intval($houseID));
    }

  header("Location: ../pages/main_page.php");
?>
