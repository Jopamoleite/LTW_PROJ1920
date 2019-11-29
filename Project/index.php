<?include_once('includes/start.php') ?>
<?include_once('database/db_user.php') ?>
<?include_once "templates/common/header.php" ?>

<body>
  <div id="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <form action="login.php" method="post">
      <p><label>Username: <input type="text" name="username" id="username" placeholder="Username" required></label></p>
      <p><label>Password: <input type="password" name="password" id="password" placeholder="Password" required></label></p>
      <input class="button" type="submit" value="Login">
    </form>
  </div>
  <div id="main">
    <form action="register.php" method="post">
      <input class="button" type="submit" value="Register">
    </form>
  </div>
  <div id='alert_msg'>
    <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
  </div> 
</body>

<?include_once "templates/common/footer.php" ?>
