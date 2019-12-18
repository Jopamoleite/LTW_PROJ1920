
<?php
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
  $owner = getUserFromId($owner_id);
  $owner_name = $owner['name'];
  $owner_user = $owner['username'];
  $owner_img = $owner['image_name'];
  $price = $house['price_day'];
?>


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
<div id="houseinfo_booking">
  <div id="house_info">
    <h1><?php echo $title ?></h1>
    <section id="house_data">
      <h2><?php echo $location ?></h2>
      <h3><?php echo $price ?>€/night</h3>
      <h3><?php echo $capacity ?> guests</h3>
    </section>
    <h4><?php echo $address ?></h4>
    <span><?php echo $description ?></span>
    <a href="user_profile_page.php?user=<?php echo $owner_user ?>">
      <img src="../images/<?php echo $owner_img ?>" width="30" height="30">
      <b><?php echo $owner_name ?></b>
    </a>
  </div>
