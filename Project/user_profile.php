<!-- HEADER -->
<?
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'templates/common/header.php';
?>

<?
  $username = $_GET['user'];
  if($username == null) header('Location: ' . 'user_profile.php?user=' . $_SESSION['username']);
  if (preg_match('[\'^£$%&*()}{@#~?><>,|=_+¬-]', $username)) header('Location: ' . 'index.php');
  if(!checkUser($username)) header('Location: ' . 'user_profile.php?user=' . $_SESSION['username']);

  $user = getUser($username);

  $location = $user['location_'];       if($location == null) $location = "undefined";
  $phone    = $user['phone_num'];       if($phone == null) $phone = "undefined";
  $email    = $user['email'];           if($email == null) $email = "undefined";
  $bio      = $user['bio'];             if($bio == null) $bio = "Biography";
?>

<!-- PROFILE -->
<div class="profile flex-container">
  <img src="images/default_pic.bmp" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div class="profile_info">
    <h1>  <? echo $username; ?> </h1>
    <p>
      <img src="images/location.png" class="icon" alt="loca" width="15" height="15">
      <? echo $location; ?>
    </p>
    <p>
      <img src="images/telephone.png" class="icon" alt="loca" width="15" height="15">
      <? echo $phone; ?>
    </p>
    <p>
      <img src="images/mail.png" class="icon" alt="loca" width="15" height="15">
      <? echo $email; ?>
    </p>
    <p id="description">
      <? echo $bio; ?>
    </p>
    <? if($username == $_SESSION['username'])
      echo "<a id='edit_profile_link' href='edit-profile.php'>Edit Profile</a>"
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
