<!-- HEADER -->
<?
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'database/houses.php';
  include_once 'templates/common/header.php';
?>

<!-- SEARCH -->
<?
  include_once 'templates/user/searchbar.php';
?>

<!-- CASINHAS -->
<section id="housinhas" class="flex_row">
  <?
    $table = getAllHouses();

    foreach ($table as $entry) {
      echo '<a class="house" href="main_page.php">';
        echo '<img src="images/default_pic.bmp" id="house pic" alt="House pic" width="300" height="300">';
        echo '<h1>' . $entry['address_'] . '</h1>';
        echo '<h2>' . $entry['title'] . '</h2>';
        echo '<h2>' . $entry['price_day'] . '€ / night</h2>';
      echo '</a>';
    }
  ?>
</section>

<!-- FOOTER -->
<?include_once 'templates/common/initial_footer.php' ?>
