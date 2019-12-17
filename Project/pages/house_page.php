<?php
chdir('..');

// FUNCTION INCLUDES
include_once 'includes/start.php';
include_once 'database/user.php';
include_once 'database/houses.php';

// HEADER
include_once 'templates/header.php';
?>

<div id="house_page">
<?php
// HOUSE INFO
include_once 'templates/house_info.php';

// BOOKING
if($owner_id != $_SESSION['userID']){
  include_once 'templates/booking.php';
}
?>
</div>

<?php
// FOOTER
include_once 'templates/footer.php';
?>
