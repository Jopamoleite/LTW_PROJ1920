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
?>

<script src="../js/open_tabs.js" defer></script>
<div class="tabs">
    <button class="tab_links" onclick="openTab(event, 'house_tab')" id="default_tab">Houses</button>
    <?php if($username == $_SESSION['username']){ ?> <button class="tab_links" onclick="openTab(event, 'reservation_tab')">Reservations</button> <?php } ?>
    <?php if($username == $_SESSION['username']){ ?>  <button class="tab_links" onclick="openTab(event, 'houses_rented_tab')">Rented Houses</button> <?php } ?>
</div>
<?php
// HOUSES TAB
include_once 'templates/user_houses.php';

// RESERVATIONS TAB
if ($username == $_SESSION['username']) {
    include_once 'templates/user_reservations.php';
}

// HOUSES RENTED TAB
if ($username == $_SESSION['username']) {
    include_once 'templates/user_houses_reserved.php';
}

// FOOTER
include_once 'templates/footer.php';
?>

