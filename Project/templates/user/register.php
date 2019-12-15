<?php
include_once 'includes/start.php';
include_once 'database/db_user.php';
?>

<body>
  <script src="js/register.js"></script>
  <div class="main" id="register_page">
    <h1><a href="index.php">HouseHunt</a></h1>
    <h2><a>Create a new profile</a></h2>
    <form action="insert_user_page.php" method="post" id="register">
      <div>
        <label><input type="text" name="username" oninput="validate_user()" id="username" maxlength="20" placeholder="  Username" required minlength="4" pattern="[\w]+"> </label>
          <div id="error_username"></div><br>
        <label><input type="email" name="email" oninput="validate_email()"  id="email" maxlength="35" placeholder="  Email" required> </label><br>
          <div id="error_email"></div><br>
        <label><input type="password" name="password" oninput="validate_password()" id="password" maxlength="20" placeholder="  Password" required minlength="8"> </label><br>
          <div id="error_password"></div><br>
        <label><input type="password" name="repeat" oninput="validate_repeat()" id="repeat" maxlength="20" placeholder="  Confirm password" required minlength="8"> </label>
          <div id="error_repeat"></div><br>
      <input onclick="check_form()" class="button" id="create_button" type="button" value="Create profile">
    </form>
    <div id="error_all"><?php if (isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])) {echo $_SESSION["errormsg"];unset($_SESSION["errormsg"]);} ?></div>
  </div>
</body>

<?php
include_once 'templates/common/initial_footer.php';
?>
