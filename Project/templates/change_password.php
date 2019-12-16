
<div class="profile flex-container">
  <img src="../images/<?php echo getUserPhoto($_SESSION['username']); ?>" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div class="profile_info">
  <?php if (isset($_SESSION['infomsg']) && !empty($_SESSION['infomsg'])) {echo "<div class='error_message'>" . $_SESSION['infomsg'] . "</div>";unset($_SESSION['infomsg']);} ?>
    <h1>  <?php echo $_SESSION['username']; ?> </h1>
    <h3>Change Password</h3>
      <form method="post" action="../actions/action_change_password.php">
          <label>Old Password:</label><br>
          <input type="password" name="password" placeholder="Old Password" maxlength="20" required/><br>
          <label>New Password:</label><br>
          <input type="password" name="newPassword" placeholder="New Password" maxlength="20" required/><br>
          <label>Confirm New Password:</label><br>
          <input type="password" name="repeat" placeholder="Confirm Password" maxlength="20" required/><br>
          <input id="change_password_button" class="button" type="submit" value="Apply Change">
      </form>
      <a id="backtoprofile_link" href="../pages/user_profile_page.php?user=<?php echo $_SESSION['username'] ?>">Back to Profile</a>
  </div>
</div>