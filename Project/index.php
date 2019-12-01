<?include_once('includes/start.php') ?>
<?include_once('database/db_user.php') ?>
<?include_once "templates/common/initial_header.php" ?>

<body>
  <div class="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <h2>slogan msm deep</h2>
    <form action="login.php" method="post">
      <p><label><input type="text" name="username" id="username" placeholder="   Username" required></label></p>
      <p><label><input type="password" name="password" id="password" placeholder="   Password" required></label></p>
      <input id="login_button" class="button" type="submit" value="Login">
    </form>
  </div>
  <div class="main">
    <form action="register.php" method="post">
      <input id="register_button" class="button" type="submit" value="Register">
    </form>
  </div>
  <div id='alert_msg'>
    <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
  </div> 
</body>

<?include_once "templates/common/initial_footer.php" ?>
