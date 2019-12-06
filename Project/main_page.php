<!-- HEADER -->
<?include_once('includes/start.php') ?>
<?include_once('database/db_user.php') ?>
<?include_once "templates/common/header.php" ?>

<!-- SEARCH -->
<?include_once "templates/user/searchbar.php" ?>

<!-- CASINHAS -->
<div id="housinhas" class="flex_row">
  <?php
    addHouse('ola', 'adeus', 420, 2, 'olaadeus', 1);
    echo "new house";

    $query = sqlite_query($dbh, 'SELECT * FROM Place LIMIT 25');
    while ($entry = sqlite_fetch_array($query, SQLITE_ASSOC)) {
      echo "<div class='house'>";
      echo "<img src='images\default_pic.bmp' id='house pic' alt='House pic' width='300' height='300'>";
      echo "<h1>" . $entry['address_'] . "</h1>";
      echo "<h2>" . $entry['title'] . "</h2>";
      echo "<h2>" . $entry['price_day'] ."€ / night</h2>";
      echo "</div>";
    }
  ?>
</div>

<!-- FOOTER -->
<?include_once "templates/common/initial_footer.php" ?>
