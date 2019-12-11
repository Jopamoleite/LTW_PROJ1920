<?php include_once 'includes/start.php' ?>
<?php include_once 'database/db_user.php' ?>
<body>
  <?php
      if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])){
        header("Location: /main_page.php");
      }
  ?>
  <div class="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <h2>slogan msm deep</h2>
    <form id="login_form" action="validate_login.php" method="post">
      <p><label><input id="username_input" type="text" name="username" id="username" placeholder="   Username" required></label></p>
      <p><label><input id="password_input" type="password" name="password" id="password" placeholder="   Password" required></label></p>
      <input id="login_button" class="button" type="submit" value="Login">
    </form>
    <form id="register_button_form" action="register_page.php" method="post">
      <input id="register_button" class="button" type="submit" value="Register">
      <div class='alert_msg'>
        <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
      </div> 
    </form>
  </div>
</body>
