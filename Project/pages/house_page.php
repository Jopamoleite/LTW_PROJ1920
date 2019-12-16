<!-- HEADER -->
<?php
chdir('..');
include_once 'includes/start.php';
include_once 'database/user.php';
include_once 'database/houses.php';
include_once 'templates/header.php';
$house_url = $_GET['house'];
if ($house_url == null) {
 header('Location: main_page.php');
}
// Check if not null
if (!ctype_digit($house_url)) {
 header('Location: main_page.php');
}
// Check if is number
$house_id = ltrim($house_url, '0');
if ($house_url[0] == '0') {
 header('Location: house_page.php?house=' . $house_id);
}
// Check if url correct
if (!checkHouse($house_id)) {
 header('Location: main_page.php');
}
// Check house exists
$house = getHouse($house_id);
$title = $house['title'];
$location = $house['location'];
$address = $house['address_'];
$capacity = $house['capacity'];
$description = $house['description'];
$owner_id = $house['ownerID'];
?>

<!-- BODY -->
<div id="house_page">
<div id="house_photos">
  <?php
$photos = getHousePhotos($house_id);
if ($photos == false) {
 $photo = "default_house.jpg";
} else {
 $photo = $photos['image_name'];
}
?>
  <img src="../images/<?php echo $photo ?>">
</div>
<div class="house">
  <div id="house_info">
    <h1><?echo $title ?></h1>
    <h2><?echo $location ?></h2>
    <h2><?echo $address ?></h2>
    <h3><?echo $capacity ?></h3>
    <h4><?echo $description ?></h4>
  </div>
  <div id="booking" class="flex-container">
        <?php if (isset($_SESSION['infomsg']) && !empty($_SESSION['infomsg'])) {echo $_SESSION['infomsg'];unset($_SESSION['infomsg']);} ?>
    <h1>BOOKING</h1>
    <form action="../actions/action_booking.php" method="post" id="booking_form">
      <!-- check in -->
      <div class="search_input_field_medium">
        <label class="search_label">Check-In</label>
        <input class="search_input" name="checkin" type="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
      </div>
      <!-- check out -->
      <div class="search_input_field_medium">
        <label class="search_label">Check-Out</label>
        <input class="search_input" name="checkout" type="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" placeholder="dd/mm/yyyy">
      </div>
      <!-- guests -->
        <div class="search_input_field_small">
            <label class="search_label">Guests</label>
            <input class="search_input" name="guests" type="number" value="1" min="1" max="<?php echo $capacity ?>" maxlength="3" step="1">
        </div>
      <!-- houseID -->
      <input type="hidden" id="houseID" name="houseID" value="<?php echo $house_id ?>">
      <!-- submit -->
      <input onclick="" class="button" id="booking_button" type="submit" value="BOOK">
    </form>
  </div>
</div>
</div>

<!-- FOOTER -->
<?
include_once 'templates/footer.php';
?>