
<div id="house_tab" class="tabcontent">
<section id="profile_houses" class="flex-container">
  <div class="user_house_list">
    <form action="../pages/add_house_page.php" method="post">
    <?php if ($username == $_SESSION['username']) { ?>
        <input id="create_houses_button" class="button" type="submit" value="Add House">
    <?php } ?>
    </form>
  <?php
$id = getUserId($username);
$houses = getHouseWithOwnerID($id);

if(empty($houses)){
  if ($username == $_SESSION['username']) { 
    echo '<a id="no_house_msg">This user has not added houses yet.</a>';
  }else{
    echo '<a id="no_reservation_rent">This user has not added houses yet.</a>';
  }
}else{
  foreach ($houses as $entry) {
    $photos = getHousePhotos($entry['id']);
    if ($photos == false) {
     $photo = "default_house.jpg";
    } else {
     $photo = $photos['image_name'];
    }
   
    echo '<a class="user_house" href="../pages/house_page.php?house=' . $entry['id'] . '">';
    echo '<img src="../images/' . $photo . '" id="house_pic" alt="House pic" width="300" height="300">';
    echo '<h2>' . $entry['location'] . '</h2>';
    echo '<h1>' . $entry['title'] . '</h1>';
    echo '<h2>' . $entry['price_day'] . '€ / night</h2>';
    echo '</a>';
   }
}
?>
<div id="filler"> Easter Egg </div>
  </div>
</section>
</div>