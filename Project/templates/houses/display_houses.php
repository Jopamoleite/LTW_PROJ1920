
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

    if(isset($_GET['destination'])) $destination = $_GET['destination']; else $destination = "";

    if(isset($_GET['checkin'])) $checkin = $_GET['checkin']; else $checkin = "";

    if(isset($_GET['checkout'])) $checkout = $_GET['checkout']; else $checkout = "";

    if(isset($_GET['guests'])) $guests = $_GET['guests']; else $guests = 1;

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
      echo '<a class="house" href="main_page.php">';
        echo '<img src="images/house.jpg" id="house pic" alt="House pic" width="300" height="300">';
        echo '<h1>' . $entry['location'] . '</h1>';
        echo '<h2>' . $entry['title'] . '</h2>';
        echo '<h2>' . $entry['price_day'] . '€ / night</h2>';
      echo '</a>';
    }
  ?>
</section>
