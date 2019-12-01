<?include_once('includes/start.php') ?>
<?include_once('database/db_user.php') ?>

<body>
  <div class="main" id="register_page">
    <h1><a href="index.php">HouseHunt</a></h1>
    <h2><a>Crie o seu perfil uwu~~</a></h2>
    <form action="insert_user.php" method="post">
      <div>
        <label><input type="text" name="username" id="username" placeholder="  Username" required></label>
        <br><label><input type="email" name="email" id="email" placeholder="  Email" required></label>
        <br><label><input type="password" name="password" id="password" placeholder="  Password" required></label>
        <br><label><input type="password" name="repeat" id="repeat" placeholder="  Confirm password" required></label>
      </div>
      <input class="button" id="create_button" type="submit" value="Create profile">
    </form>
  </div>
  <div id='alert_msg'>
    <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
  </div> 
</body>