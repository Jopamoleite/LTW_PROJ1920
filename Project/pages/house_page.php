<?php
  chdir('..');
  include_once 'includes/start.php';
  include_once 'database/user.php';
  include_once 'database/houses.php';
  include_once 'templates/header.php';
?>

<div id="house_page">
  <?php
    include_once 'templates/house_info.php';
    if ($owner_id == $_SESSION['userID']) { include_once 'templates/edit_house.php'; }
    else { include_once 'templates/booking.php'; }
  ?>
</div>

<?php
  include_once 'templates/footer.php';
?>
