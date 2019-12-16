<?php
chdir('..');

// FUNCTION INCLUDES
include_once 'includes/start.php';
include_once 'database/user.php';
include_once 'database/houses.php';

// HEADER
include_once 'templates/header.php';

// PROFILE
include_once 'templates/profile_info.php';

// HOUSES TAB
include_once 'templates/user_houses.php';

// FOOTER
include_once 'templates/footer.php';
?>
