<?php
  chdir('..');

  include_once 'includes/start.php';
  include_once 'database/houses.php';

  if (isset($_GET['in']) && !empty($_GET['in']) && isset($_GET['out']) && !empty($_GET['out']) && isset($_GET['house']) && !empty($_GET['house']) && isset($_GET['guests']) && !empty($_GET['guests'])) {
  $in = $_GET['in'];
  $out = $_GET['out'];
  $house = $_GET['house'];
  $guests = $_GET['guests'];

  if (getConflict_($house, $in, $out)) {
    echo "Invalid dates";
    die();
  }

  $house_obj = getHouse($house);
  if ($guests > (int)$house_obj['capacity']) {
    echo "Guests over capacity";
    die();
  }

  echo "Valid";
  die();
  }

  if (isset($_GET['in']) && !empty($_GET['in']) && isset($_GET['house']) && !empty($_GET['house'])) {
  $in = $_GET['in'];
  $house = $_GET['house'];
  if (getConflict($house, $in)) {
    echo "Invalid check-in";
    die();
  }

  echo "Valid";
  die();
  }

  if (isset($_GET['out']) && !empty($_GET['out']) && isset($_GET['house']) && !empty($_GET['house'])) {
  $out = $_GET['out'];
  $house = $_GET['house'];

  if (getConflict($house, $out)) {
    echo "Invalid check-out";
    die();
  }

  echo "Valid";
  die();
  }

  if (isset($_GET['house']) && !empty($_GET['house']) && isset($_GET['guests']) && !empty($_GET['guests'])) {
  $guests = $_GET['guests'];
  $house = $_GET['house'];

  $house_obj = getHouse($house);
  if ($guests > $house_obj['capacity']) {
    echo "Guests over capacity";
    die();
  }

  echo "Valid";
  die();
  }
?>
