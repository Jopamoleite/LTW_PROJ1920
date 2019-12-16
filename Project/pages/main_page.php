<?php
chdir('..');

// FUNCTION INCLUDES
include_once 'includes/start.php';
include_once 'database/user.php';
include_once 'database/houses.php';

// HEADER
include_once 'templates/header.php';

// SEARCHBAR
include_once 'templates/searchbar.php';

// HOUSES
include_once 'templates/display_houses.php';

// FOOTER
include_once 'templates/initial_footer.php'
?>
