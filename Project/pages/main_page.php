<?php
chdir('..');

/* HEADER */
include_once 'includes/start.php';
include_once 'database/user.php';
include_once 'database/houses.php';
include_once 'templates/header.php';

/* SEARCH */
include_once 'templates/searchbar.php';

/* CASINHAS */
include_once 'templates/display_houses.php';

/* FOOTER */
include_once 'templates/initial_footer.php'

?>
