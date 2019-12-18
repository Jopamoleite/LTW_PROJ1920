
<?php
include_once 'includes/start.php';
?>

<section id="houses_list" class="flex-container">
  <?php
    $destination;
    $checkin;
    $checkout;
    $guests;

    if (!empty($_GET['destination'])) {
      $destination = trim(htmlspecialchars($_GET['destination']));
    } else {
      $destination = "";
    }

    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $destination)) {
      header('Location: main_page.php');
      die();
    }

    if (!empty($_GET['checkin'])) {
      $checkin = trim(htmlspecialchars($_GET['checkin']));
    } else {
      $checkin = "";
    }

    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬]', $checkin)) {
      header('Location: main_page.php');
      die();
    }

    if (!empty($_GET['checkout'])) {
      $checkout = trim(htmlspecialchars($_GET['checkout']));
    } else {
      $checkout = "";
    }

    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬]', $checkout)) {
      header('Location: main_page.php');
      die();
    }

    if (!empty($_GET['guests'])) {
      $guests = ltrim(trim(htmlspecialchars($_GET['guests'])), '0');
    } else {
      $guests = 1;
    }

    if (!ctype_digit($guests)) {
      $guests = 1;
    }

    if ($guests > 100) {
      $guests = 100;
    }

    $houses;
    if (empty($destination) && empty($checkin) && empty($checkout)) {
      $houses = getHousesWithGuests($guests);
    } elseif (!empty($destination) && empty($checkin) && empty($checkout)) {
      $houses = getHousesAtLocation($destination, $guests);
    } elseif (!empty($destination) && !empty($checkin) && empty($checkout)) {
      $houses = getHousesWithOneDateAndLocation($destination, $checkin, $guests);
    } elseif (!empty($destination) && empty($checkin) && !empty($checkout)) {
      $houses = getHousesWithOneDateAndLocation($destination, $checkout, $guests);
    } elseif (empty($destination) && !empty($checkin) && empty($checkout)) {
      $houses = getHousesWithOneDate($checkin, $guests);
    } elseif (empty($destination) && empty($checkin) && !empty($checkout)) {
      $houses = getHousesWithOneDate($checkout, $guests);
    } elseif (empty($destination) && !empty($checkin) && !empty($checkout)) {
      $houses = getHousesWithTwoDates($checkin, $checkout, $guests);
    } elseif (!empty($destination) && !empty($checkin) && !empty($checkout)) {
      $houses = getHousesWithTwoDatesAndLocation($destination, $checkin, $checkout, $guests);
    }

    if (empty($houses)) { ?>
      <a class="no_match" href="../pages/main_page.php">
        <img src="../images/no_matches.png" id="no_match" alt="No matches">
        <h1>It appears there are no houses matching that criteria :( </h1>
      </a>
    <?php
    } else {
      foreach ($houses as $entry) {
        $photos = getHousePhotos($entry['id']);
        if ($photos == false) {
          $photo = "default_house.jpg";
        } else {
          $photo = $photos['image_name'];
        } ?>
        <a class="house" href="../pages/house_page.php?house=<?php echo $entry['id'] ?>">
          <img src="../images/<?php echo $photo ?>" id="house pic" alt="House pic" width="300" height="300">
          <h1> <?php echo $entry['location']; ?> </h1>
          <h2> <?php echo $entry['title']; ?> </h2>
          <h2> <?php echo $entry['price_day']; ?> € / night</h2>
        </a>
        <?php
      }
    }
  ?>
</section>
<script src="../js/positionhouses.js" defer></script>
