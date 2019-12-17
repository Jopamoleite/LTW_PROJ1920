
<div id="houses_rented_tab" class="tabcontent">
<section id="profile_houses_rented" class="flex-container">
  <div class="user_house_list">
  <?php
    $rented = getUserHousesReservations($id, date("Y-m-d"));

    if(empty($rented)){
      echo '<a id="no_reservation_rent">No one has rented this user\'s houses.</a>';
    }else{
      foreach ($rented as $entry) {
        $photos = getHousePhotos($entry['placeID']);
        if ($photos == false) {
        $photo = "default_house.jpg";
        } else {
        $photo = $photos['image_name'];
        }
        echo '<a class="user_house" href="../pages/house_page.php?house=' . $entry['placeID'] . '">';
        echo '<img src="../images/' . $photo . '" id="house_pic" alt="House pic" width="300" height="300">';
        echo '<h2> Check-in: ' . $entry['begin_date'] . '</h2>';
        echo '<h2>Check-out: ' . $entry['end_date'] . '</h2>';
        echo '</a>';
      }
    }
  ?>
  <div id="filler"> Easter Egg </div>
  </div>
</section>
</div>