<!-- HEADER -->
<?php
include_once 'includes/start.php';
include_once 'database/db_user.php';
include_once 'database/houses.php';
include_once 'templates/common/header.php';
?>

<?php
$username = $_GET['user'];
if (empty($username)) {
 header('Location: main_page.php');
}

if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $username)) {
 header('Location: ' . 'index.php');
}

if (!checkUser($username)) {
 header('Location: main_page.php');
}

$user = getUser($username);

$name = $user['name'];if (empty($name)) {
 $name = "No name provided";
}

$location = $user['location_'];if (empty($location)) {
 $location = "No location available";
}

$phone = $user['phone_num'];if (empty($phone)) {
 $phone = "No contact number provided";
}

$email = $user['email'];if (empty($email)) {
 $email = "No e-mail provided";
}

$bio = $user['bio'];if (empty($bio)) {
 $bio = "Biography";
}

$image_name = $user['image_name'];if (empty($image_name)) {
 $image_name = "default_pic.bmp";
}

?>

<!-- PROFILE -->
<script src="js/editprofilepic.js"></script>
<div class="profile flex-container">
        <?php if (isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])) {echo $_SESSION["errormsg"];unset($_SESSION["errormsg"]);} ?>



  <img src="images/<?php echo $image_name ?>" id="profile_pic" alt="Profile Pic" width="300" height="300">

  <?php if ($username == $_SESSION['username']) { ?>
  <form id ="edit_profile_pic_form" action="action_edit_picture.php" method="post" enctype="multipart/form-data">
      <input oninput="upload()" id="profile_pic_upload" type="file" name="picture">
      <label for="profile_pic_upload">Select file</label>
  </form>
  <?php } ?>



  <div class="profile_info">
    <h1>  <?php echo $username; ?> </h1>
    <p>
      <?php echo $name; ?>
    </p>
    <p>
      <img src="images/location.png" class="icon" alt="loca" width="15" height="15">
      <?php echo $location; ?>
    </p>
    <p>
      <img src="images/telephone.png" class="icon" alt="phone" width="15" height="15">
      <?php echo $phone; ?>
    </p>
    <p>
      <img src="images/mail.png" class="icon" alt="mail" width="15" height="15">
      <?php echo $email; ?>
    </p>
    <p id="description">
      <?php echo $bio; ?>
    </p>
    <?php if ($username == $_SESSION['username']) { ?>
      <a id='edit_profile_link' href='edit_profile_page.php'>Edit Profile</a>
    <?php } ?>
    </p>
    <?php if ($username == $_SESSION['username']) { ?>
      <a id='change_password_link' href='change_password_page.php'>Change Password</a>
    <?php } ?>
  </div>
</div>

<!-- TABS -->
<form action="add_houses.php" method="post">
<?php if ($username == $_SESSION['username']) { ?>
    <input id="create_houses_button" class="button" type="submit" value="Add House">
<?php } ?>
</form>

<section id="profile_houses" class="flex_row">
  <?php
$id = getUserId($username);
$houses = getHouseWithOwnerID($id);
foreach ($houses as $entry) {
 $photos = getHousePhotos($entry['id']);
 if ($photos == false) {
  $photo = "default_house.jpg";
 } else {
  $photo = $photos['image_name'];
 }

 echo '<a class="house" href="house_page.php?house=' . $entry['id'] . '">';
 echo '<img src="images/' . $photo . '" id="house pic" alt="House pic" width="300" height="300">';
 echo '<h1>' . $entry['location'] . '</h1>';
 echo '<h2>' . $entry['title'] . '</h2>';
 echo '<h2>' . $entry['price_day'] . '€ / night</h2>';
 echo '</a>';
}
?>
</section>

<!-- FOOTER -->
<?
include_once 'templates/common/footer.php';
?>
