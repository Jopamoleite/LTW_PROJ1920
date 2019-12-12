<!-- HEADER -->
<?php
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'templates/common/header.php';
?>

<?php
  $username = $_GET['user'];
  if(empty($username)) header('Location: main_page.php');
  if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $username)) header('Location: ' . 'index.php');
  if(!checkUser($username)) header('Location: main_page.php');

  $user = getUser($username);

  $name     = $user['name'];            if(empty($name)) $name = "No name provided";
  $location = $user['location_'];       if(empty($location)) $location = "No location available";
  $phone    = $user['phone_num'];       if(empty($phone)) $phone = "No contact number provided";
  $email    = $user['email'];           if(empty($email)) $email = "No e-mail provided";
  $bio      = $user['bio'];             if(empty($bio)) $bio = "Biography";
?>

<!-- PROFILE -->
<div class="profile flex-container">
  <img src="images/default_pic.bmp" id="profile_pic" alt="Profile Pic" width="300" height="300">
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
    <?php if($username == $_SESSION['username'])
      echo "<a id='edit_profile_link' href='edit-profile.php'>Edit Profile</a>"
    ?>
    </p>
    <?php if($username == $_SESSION['username'])
      echo "<a id='change_password_link' href='change_password.php'>Change Password</a>"
    ?>
  </div>
</div>

<!-- TABS -->

<form action="add_houses.php" method="post">
  <input id="create_houses_button" class="button" type="submit" value="Add House">
</form>

<!-- FOOTER -->
<?
  include_once 'templates/common/footer.php';
?>
