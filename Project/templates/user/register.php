<?php
include_once 'includes/start.php';
include_once 'database/db_user.php';
?>

<body>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/register.js"></script>
  <div class="main" id="register_page">
    <h1><a href="index.php">HouseHunt</a></h1>
    <h2><a>Create a new profile</a></h2>
    <form action="insert_user.php" method="post" id="register">
      <div>
        <label><input type="text" name="username" oninput="validate_user()" id="username" placeholder="  Username" required minlength="4" pattern="[\w]+"> </label>
          <div id="error_username"></div><br>
        <label><input type="email" name="email" oninput="validate_email()"  id="email" placeholder="  Email" required> </label><br>
          <div id="error_email"></div><br>
        <label><input type="password" name="password" oninput="validate_password()" id="password" placeholder="  Password" required minlength="8"> </label><br>
          <div id="error_password"></div><br>
        <label><input type="password" name="repeat" oninput="validate_repeat()" id="repeat" placeholder="  Confirm password" required minlength="8"> </label>
          <div id="error_repeat"></div><br>
      <input onclick="check_form()" class="button" id="create_button" type="button" value="Create profile">
    </form>
    <div id="error_all"></div>
  </div>
</body>

<?php
  include_once 'templates/common/initial_footer.php';
?>
