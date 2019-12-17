
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

        if (empty($houses)) {
          if ($username == $_SESSION['username']) { ?>
            <a id="no_house_msg">This user has not added houses yet.</a>
          <?php
          }else{ ?>
            <a id="no_reservation_rent">This user has not added houses yet.</a>
        <?php }
        } else {
          foreach ($houses as $entry) {
            $photos = getHousePhotos($entry['id']);
            if ($photos == false) {
              $photo = "default_house.jpg";
            } else {
              $photo = $photos['image_name'];
            }
            ?>
            <a class="user_house" href="../pages/house_page.php?house=<?php echo $entry['id'] ?>">
            <img src="../images/<?php echo $photo ?>" id="house_pic" alt="House pic" width="300" height="300">
            <h2><?php echo $entry['location'] ?></h2>
            <h1><?php echo $entry['title'] ?></h1>
            <h2><?php echo $entry['price_day'] ?>€ / night</h2>
            </a>
            <?php
          }
        }
      ?>
      <form action="../pages/add_house_page.php" method="post">
        <?php if ($username == $_SESSION['username']) { ?>
            <input id="create_houses_button" class="button" type="submit" value="Add House">
        <?php } ?>
      </form>
    </div>
  </section>
</div>
