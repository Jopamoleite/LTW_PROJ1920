
<?
  include_once 'includes/start.php';
?>

<section id="houses_list" class="flex_row">
  <script src="scripts/positionhouses.js"></script> 
  <?

    if(!empty($_GET['location']) && !empty($_GET['checkin']) && !empty($_GET['checkout']) && !empty($_GET['guests'])){
        $location = $_GET['location'];
        $checkin = $_GET['checkin'];
        $checkout = $_GET['checkout'];
        $location = $_GET['location'];
    }
    
    $table = getAllHouses();

    foreach ($table as $entry) {
      echo '<a class="house" href="main_page.php">';
        echo '<img src="images/house.jpg" id="house pic" alt="House pic" width="300" height="300">';
        echo '<h1>' . $entry['location'] . '</h1>';
        echo '<h2>' . $entry['title'] . '</h2>';
        echo '<h2>' . $entry['price_day'] . '€ / night</h2>';
      echo '</a>';
    }
  ?>
</section>