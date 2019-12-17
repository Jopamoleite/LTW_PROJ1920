<?php
    chdir('..');
    include_once 'includes/start.php';
    include_once 'database/user.php';
    include_once 'database/houses.php';
    include_once 'templates/header.php';
    include_once 'templates/profile_info.php';
?>

<div class="tabs">
    <button class="tab_links" onclick="openTab(event, 'house_tab')" id="default_tab">Houses</button>
    <?php if ($username == $_SESSION['username']) { ?> <button class="tab_links" onclick="openTab(event, 'reservation_tab')">Reservations</button> <?php } ?>
    <?php if ($username == $_SESSION['username']) { ?>  <button class="tab_links" onclick="openTab(event, 'houses_rented_tab')">Rented Houses</button> <?php } ?>
</div>
<?php
    include_once 'templates/user_houses.php';
    if ($username == $_SESSION['username']) { include_once 'templates/user_reservations.php'; }
    if ($username == $_SESSION['username']) { include_once 'templates/user_houses_reserved.php'; }
    include_once 'templates/footer.php';
?>
<script src="../js/open_tabs.js" defer></script>
