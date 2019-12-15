<?php
    include_once 'includes/start.php';
    include_once 'database/houses.php';

    $checkin  = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guests   = $_POST['guests'];

    $checkin = trim(htmlspecialchars($checkin));
    $checkout = trim(htmlspecialchars($checkout));
    $guests = ltrim(trim(htmlspecialchars($guests)),'0');


    header('Location: main_page.php');
?>
