<!-- HEADER -->
<?
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'templates/common/header.php';
?>

<?
  $house_url = $_GET['house'];
  if($house_url == null) header('Location: main_page.php');
  if(!ctype_digit($house_url)) header('Location: main_page.php');
  $house_id = (int)$house_url;

  /*

    if(!checkHouse($house_id)) header('Location: main_page.php');
    $house = getHouse($house_id);

    $title        = $house['tile'];        if($title == null)        $title = "Title";
    $location     = $house['location'];    if($location == null)     $location = "No location available";
    $address      = $house['address_'];    if($address == null)      $phone = "No contact number provided";
    $capacity     = $house['capacity'];    if($capacity == null)     $capacity = "No e-mail provided";
    $description  = $house['description']; if($description == null)  $description = "No description";
    $owner_id     = $house['ownerID'];     if($owner_id == null)     $owner_id = "No owner";

  */
?>



<!-- FOOTER -->
<?
  include_once 'templates/common/footer.php';
?>
