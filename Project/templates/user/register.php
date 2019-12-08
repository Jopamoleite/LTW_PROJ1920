<?
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
        <label><input type="text" name="username" onblur="validate('username',this.value)" id="username" placeholder="  Username" required minlength="4" pattern="[\w]+"> </label>
          <div id="error_username"></div><br>
        <label><input type="email" name="email" onblur="validate('email',this.value)"  id="email" placeholder="  Email" required> </label><br>
          <div id="error_email"></div><br>
        <label><input type="password" name="password" onblur="validate_password()" id="password" placeholder="  Password" required minlength="8"> </label><br>
          <div id="error_password"></div><br>
        <label><input type="password" name="repeat" onblur="validate_repeat()" id="repeat" placeholder="  Confirm password" required minlength="8"> </label>
          <div id="error_repeat"></div><br>
      </div>
      <input onclick="check_form()" class="button" id="create_button" type="button" value="Create profile">
      <div class='alert_msg'>
        <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
      </div> 
    </form>
    <div id="error_all"></div>
  </div>
</body>
