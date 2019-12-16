
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
<div class="house">
  <div id="house_info">
<<<<<<< HEAD
    <h1><?echo $title ?></h1>
    <h2><?echo $location ?></h2>
    <h2><?echo $address ?></h2>
    <h3><?echo $capacity ?></h3>
    <h4><?echo $description ?></h4>
  </div>
=======
    <h1><?php echo $title ?></h1>
    <h2><?php echo $location ?></h2>
    <h3><?php echo $price ?>€/night</h3>
    <h3><?php echo $capacity ?> guests</h3>
    <h4><?php echo $address ?></h4>
    <a><?php echo $description ?></a>
  </div>
>>>>>>> 013c6dcf74bf2274c9af8598f8bba073a55af562
