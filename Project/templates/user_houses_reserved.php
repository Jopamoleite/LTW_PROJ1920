
<div id="houses_rented_tab" class="tabcontent">
  <section id="profile_houses_rented" class="flex-container">
    <div class="user_house_list">
    <?php
      $rented = getUserHousesReservations($id, date("Y-m-d"));

      if (empty($rented)) { ?>
        <a id="no_house_msg">No one has rented this user's houses.</a>
      <?php
      } else {
        foreach ($rented as $entry) {
          $photos = getHousePhotos($entry['placeID']);
          if ($photos == false) {
            $photo = "default_house.jpg";
          } else {
            $photo = $photos['image_name'];
          }?>
          <a class="user_house" href="../pages/house_page.php?house=<?php echo $entry['placeID'] ?>">
            <img src="../images/<?php echo $photo ?>" id="house_pic" alt="House pic" width="300" height="300">
            <h2> Check-in: <?php echo $entry['begin_date'] ?></h2>
            <h2> Check-out: <?php echo $entry['end_date'] ?></h2>
          </a>
          <?php
        }
      }
      ?>
    <div id="filler"> Easter Egg </div>
    </div>
  </section>
</div>
