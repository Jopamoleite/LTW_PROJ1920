
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
?>

<!-- BODY -->
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