<?php
    include_once 'includes/start.php';
    include_once 'database/houses.php';

    $checkin  = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guests   = $_POST['guests'];
    $houseID  = $_POST['houseID'];

    $checkin = trim(htmlspecialchars($checkin));
    $checkout = trim(htmlspecialchars($checkout));
    $guests = ltrim(trim(htmlspecialchars($guests)),'0');

    $reservations = getHouseReservations($houseID);
    
    foreach ($reservations as $entry) {
    }

    header('Location: house_page.php?house='.$houseID);

?>
