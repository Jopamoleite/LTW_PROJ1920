
<div class="profile flex-container">
  <img src="../images/<?php getUserPhoto($_SESSION['username']); ?>" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div class="profile_info">
  <?php echo_info(); ?>
    <h1>  <?php echo $_SESSION['username']; ?> </h1>
    <h3>Change Password</h3>
      <form id="form" method="post" action="../actions/action_change_password.php">
          <label>Old Password:</label><br>
          <input type="password" id="old" oninput="validate_old()" name="password" placeholder="Old Password" maxlength="20" required/><br>
            <div id="error_old"></div><br>

          <label>New Password:</label><br>
          <input type="password" id="new" oninput="validate_new()" name="newPassword" placeholder="New Password" maxlength="20" required/><br>
            <div id="error_new"></div><br>

          <label>Confirm New Password:</label><br>
          <input type="password" id="cnf" oninput="validate_cnf()" name="repeat" placeholder="Confirm Password" maxlength="20" required/><br>
            <div id="error_cnf"></div><br>

          <input id="change_password_button" oninput="validate_form()" class="button" type="submit" value="Apply Change">
      </form>
      <div id="error_all"></div><br>
      <a id="backtoprofile_link" href="../pages/user_profile_page.php?user=<?php echo $_SESSION['username'] ?>">Back to Profile</a>
  </div>
</div>
<script src="../js/changepassword.js" defer></script>
