
<?php
$username = $_GET['user'];
if (empty($username)) {
 header('Location: main_page.php');
}

if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $username)) {
 header('Location: ../index.php');
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

<script src="../js/editprofilepic.js" defer></script>
<div class="profile flex-container">
  <div id="profile_picture_settings">
  <img src="../images/<?php echo $image_name ?>" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <?php if ($username == $_SESSION['username']) { ?>
  <form id ="edit_profile_pic_form" action="../actions/action_edit_picture.php" method="post" enctype="multipart/form-data">
      <input oninput="upload()" id="profile_pic_upload" type="file" name="picture">
      <label for="profile_pic_upload">Select file</label>
  </form>
  <?php } ?>
  <?php if (isset($_SESSION['infomsg']) && !empty($_SESSION['infomsg'])) {echo "<div class='error_message'>" . $_SESSION['infomsg'] . "</div>";unset($_SESSION['infomsg']);} ?>
  </div>



  <div class="profile_info">
    <h1>  <?php echo $username; ?> </h1>
    <p>
      <?php echo $name; ?>
    </p>
    <p>
      <img src="../images/location.png" class="icon" alt="loca" width="15" height="15">
      <?php echo $location; ?>
    </p>
    <p>
      <img src="../images/telephone.png" class="icon" alt="phone" width="15" height="15">
      <?php echo $phone; ?>
    </p>
    <p>
      <img src="../images/mail.png" class="icon" alt="mail" width="15" height="15">
      <?php echo $email; ?>
    </p>
    <p id="description">
      <?php echo $bio; ?>
    </p>
    <?php if ($username == $_SESSION['username']) { ?>
      <a id='edit_profile_link' href='../pages/edit_profile_page.php'>Edit Profile</a>
    <?php } ?>
    </p>
    <?php if ($username == $_SESSION['username']) { ?>
      <a id='change_password_link' href='../pages/change_password_page.php'>Change Password</a>
    <?php } ?>
  </div>
</div>
