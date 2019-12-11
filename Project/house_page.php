<!-- HEADER -->
<?php
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'database/houses.php';
  include_once 'templates/common/header.php';

  $house_url = $_GET['house'];
  if($house_url == null) header('Location: main_page.php');                                       // Check if not null
  if(!ctype_digit($house_url)) header('Location: main_page.php');                                 // Check if is number
  $house_id = (int)$house_url;
  if($house_url[0] == '0') header('Location: house_page.php?house=' . $house_id);                 // Check if url correct
  if(!checkHouse($house_id)) header('Location: main_page.php');                                   // Check house exists
  $house = getHouse($house_id);

  $title        = $house['tile'];
  $location     = $house['location'];
  $address      = $house['address_'];
  $capacity     = $house['capacity'];
  $description  = $house['description'];
  $owner_id     = $house['ownerID'];
?>

<!-- BODY -->
<div id="house_info" class="flex-container">
  <img src="images/default_pic.bmp">
</div>
<div class="house">
  <div id="house_info">
    <h1><? echo $title ?></h1>
    <h2><? echo $location ?></h2>
    <h2><? echo $address ?></h2>
    <h3><? echo $capacity ?></h3>
    <h4><? echo $description ?></h4>
  </div>
  <div id="booking" class="flex-container">
    <h1>BOOKING</h1>
    <form action="booking.php" method="post" id="booking_form">
      <!-- check in -->
      <div class="search_input_field_medium">
        <label class="search_label">Check-In</label>
        <input class="search_input" name="checkin" type="date" placeholder="dd/mm/yyyy">
      </div>
      <!-- check out -->
      <div class="search_input_field_medium">
        <label class="search_label">Check-Out</label>
        <input class="search_input" name="checkout" type="date" placeholder="dd/mm/yyyy">
      </div>
      <!-- submit -->
      <input onclick="" class="button" id="booking_button" type="button" value="BOOK">
    </form>
  </div>
</div>

<!-- FOOTER -->
<?
  include_once 'templates/common/footer.php';
?>
