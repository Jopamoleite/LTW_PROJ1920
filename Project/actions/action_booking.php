<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/houses.php';

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$guests = $_POST['guests'];
$houseID = $_POST['houseID'];

$checkin = trim($checkin);
$checkout = trim($checkout);
$guests = ltrim(trim(htmlspecialchars($guests)), '0');

$checkinDate = new DateTime($checkin);
$checkoutDate = new DateTime($checkout);

if ($checkinDate > $checkoutDate) {
 $checkinDate = new DateTime($checkout);
 $checkoutDate = new DateTime($checkin);
 $checkin = $_POST['checkout'];
 $checkout = $_POST['checkin'];
}

$reservations = getHouseReservations($houseID);

foreach ($reservations as $entry) {
 $reservationCheckin = new DateTime($entry['begin_date']);
 $reservationCheckout = new DateTime($entry['end_date']);
 if ($checkinDate >= $reservationCheckin && $checkinDate <= $reservationCheckout) {
  $_SESSION['infomsg'] = "Check-in date conflicts with existing reservation!";
  header('Location: ../pages/house_page.php?house=' . $houseID);
  die();
 }
 if ($checkoutDate >= $reservationCheckin && $checkoutDate <= $reservationCheckout) {
  $_SESSION['infomsg'] = "Check-out date conflicts with existing reservation!";
  header('Location: ../pages/house_page.php?house=' . $houseID);
  die();
 }
}

addReservation($houseID, $_SESSION['userID'], $checkin, $checkout);

$_SESSION['infomsg'] = "Reservations made!";

header('Location: ../pages/house_page.php?house=' . $houseID);
