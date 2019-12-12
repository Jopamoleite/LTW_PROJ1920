<!-- HEADER -->
<?php
  include_once "includes/start.php";
  include_once "database/db_user.php";
  include_once "templates/common/header.php";
?>

<!-- PROFILE -->
<div class="profile flex-container">
  <img src="images/default_pic.bmp" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div class="profile_info">
        <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
    <h1>  <?php echo $_SESSION['username']; ?> </h1>
    <h3>Change Password</h3>
      <form method="post" action="action_change_password.php">
          <label>Old Password:</label><br>
          <input type="password" name="password" placeholder="Old Password" required/><br>
          <label>New Password:</label><br>
          <input type="password" name="newPassword" placeholder="New Password" required/><br>
          <label>Confirm New Password:</label><br>
          <input type="password" name="repeat" placeholder="Confirm Password" required/><br>
          <input id="change_password_button" class="button" type="submit" value="Apply Change">
      </form>
      <a id="backtoprofile_link" href="user_profile.php?user=<?php echo $_SESSION['username'] ?>">Back to Profile</a>
  </div>
</div> 

<!-- FOOTER -->
<?php
  include_once 'templates/common/footer.php'
?>
