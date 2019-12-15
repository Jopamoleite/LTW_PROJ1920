
<?php
  include_once 'includes/start.php';
?>

<section id="houses_list" class="flex_row">
  <script src="js/positionhouses.js"></script>
  <?php
    $destination;
    $checkin;
    $checkout;
    $guests;

    if(isset($_GET['destination'])) $destination = trim(htmlspecialchars($_GET['destination'])); else $destination = "";
    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $destination)){
        header('Location: ' . 'main_page.php');
        die();
    }

    if(isset($_GET['checkin'])) $checkin = trim(htmlspecialchars($_GET['checkin'])); else $checkin = "";
    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬]', $checkin)){
        header('Location: ' . 'main_page.php');
        die();
    }

    if(isset($_GET['checkout'])) $checkout = trim(htmlspecialchars($_GET['checkout'])); else $checkout = "";
    if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬]', $checkout)){
        header('Location: ' . 'main_page.php');
        die();
    }

    if(isset($_GET['guests'])) $guests = ltrim(trim(htmlspecialchars($_GET['guests'])), '0'); else $guests = 1;
    if (!ctype_digit ($guests)) $guests = 1;
    if($guests > 100) $guests = 100;

    $houses;
    if(empty($destination) && empty($checkin) && empty($checkout)) $houses = getHousesWithGuests($guests); else

    if(!empty($destination) && empty($checkin) && empty($checkout)) $houses = getHousesAtLocation($destination, $guests); else

    if(!empty($destination) && !empty($checkin) && empty($checkout)) $houses = getHousesAtLocation($destination, $guests); /*TO DO: GET HOUSES AVAILABLE FOR DAY = CHECKIN AND LOCATION = DESTINATION;*/ else

    if(!empty($destination) && empty($checkin) && !empty($checkout)) $houses = getHousesAtLocation($destination, $guests); /*TO DO: GET HOUSES AVAILABLE FOR DAY = CHECKOUT AND LOCATION = DESTINATION;*/ else

    if(empty($destination) && !empty($checkin) && empty($checkout)) $houses = getHousesWithGuests($guests); /*TO DO: GET HOUSES AVAILABLE FOR DAY = CHECKIN*/ else

    if(empty($destination) && empty($checkin) && !empty($checkout)) $houses = getHousesWithGuests($guests); /*TO DO: GET HOUSES AVAILABLE FOR DAY = CHECKOUT ;*/ else

    if(empty($destination) && !empty($checkin) && !empty($checkout)) $houses = getHousesWithGuests($guests); /*TO DO: GET HOUSES AVAILABLE FOR DAYS BETWEEN CHECKIN AND CHECKOUT;*/ else

    if(!empty($destination) && !empty($checkin) && !empty($checkout)) $houses = getHousesAtLocation($destination, $guests); /*TO DO: GET HOUSES AVAILABLE FOR DAYS BETWEEN CHECKIN AND CHECKOUT AND LOCATION = DESTINATION;*/

    foreach ($houses as $entry) {
      $photos = getHousePhotos($entry['id']);
      if($photos == false) $photo = "default_house.jpg";
      else $photo = $photos['image_name'];
      echo '<a class="house" href="house_page.php?house='.$entry['id'].'">';
        echo '<img src="images/'.$photo.'" id="house pic" alt="House pic" width="300" height="300">';
        echo '<h1>' . $entry['location'] . '</h1>';
        echo '<h2>' . $entry['title'] . '</h2>';
        echo '<h2>' . $entry['price_day'] . '€ / night</h2>';
      echo '</a>';
    }
  ?>
</section>
