<!-- HEADER -->
<?php
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'database/houses.php';
  include_once 'templates/common/header.php';
?>

<!-- SEARCH -->
<?php
  include_once 'templates/user/searchbar.php';
?>

<!-- CASINHAS -->
<?php
  include_once 'templates/houses/display_houses.php';
?>

<!-- FOOTER -->
<?php
  include_once 'templates/common/initial_footer.php' 
?>
