
<?php
$user = getUser($_SESSION['username']);

$username = $user['username'];
$name = $user['name'];
$location = $user['location_'];
$phone = $user['phone_num'];
$email = $user['email'];
$bio = $user['bio'];
?>

<div class="profile flex-container">
  <script src="../js/editprofile.js" defer></script>
  <img src="../images/<?php echo getUserPhoto($_SESSION['username']); ?>" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div class="profile_info">
  <?php if (isset($_SESSION['infomsg']) && !empty($_SESSION['infomsg'])) {echo "<div class='error_message'>" . $_SESSION['infomsg'] . "</div>";unset($_SESSION['infomsg']);} ?>
    <h1>  <?php echo $_SESSION['username']; ?> </h1>
    <h3>Update Profile Information</h3>
      <form method="post" id="form" action="../actions/action_edit_profile.php">
          <label>Username:</label><br>
          <input id="username" type="text" name="username" oninput="validate_username()" value="<?php if (!empty($username)) {echo $username;} ?>" placeholder="Username" minlength="4" maxlength="20" required/><br>
            <div id="error_username"></div><br>

          <label>Name:</label><br>
          <input id="name" type="text" name="name" oninput="validate_name()"value="<?php if (!empty($name)) {echo $name;} ?>" placeholder="Name" maxlength="35"/><br>
            <div id="error_name"></div><br>

          <label>Location:</label><br>
          <input id="location" type="text" name="location" oninput="validate_location()"value="<?php if (!empty($location)) {echo $location;} ?>" placeholder="Location" maxlength="35"/><br>
            <div id="error_location"></div><br>

          <label>Phone Number:</label><br>
          <input id="phone" type="text" name="phone" oninput="validate_phone()"value="<?php if (!empty($phone)) {echo $phone;} ?>" placeholder="Phone Number" maxlength="16"/><br>
            <div id="error_phone"></div><br>

          <label>Email Address:</label><br>
          <input id="email" type="email" name="email" oninput="validate_email()"value="<?php if (!empty($email)) {echo $email;} ?>" maxlength="35" required/><br><br>
            <div id="error_email"></div><br>

          <label>Bio:</label><br>
          <textarea id="bio" name="bio" rows="3" cols="50" oninput="validate_bio()" maxlength="100" placeholder="Write something about yourself"><?php if (!empty($bio)) {echo $bio;} ?> </textarea><br><br>
            <div id="error_bio"></div><br>

          <input id="edit_profile_button" onclick="validate_form()" class="button" type="submit" value="Update Profile">
      </form>
      <div id="error_all"></div>
      <a id="backtoprofile_link" href="user_profile_page.php?user=<?php echo $_SESSION['username'] ?>">Back to Profile</a>
  </div>
</div>
