<?include_once('includes/start.php') ?>
<?include_once('database/db_user.php') ?>
<body>
  <?php 
      if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){ 
        header("Location: main_page.php"); 
      }
  ?>
  <div class="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <h2>slogan msm deep</h2>
    <form action="validate_login.php" method="post">
      <p><label><input type="text" name="username" id="username" placeholder="   Username" required></label></p>
      <p><label><input type="password" name="password" id="password" placeholder="   Password" required></label></p>
      <input id="login_button" class="button" type="submit" value="Login">
    </form>
  </div>
  <div class="main">
    <form action="register_page.php" method="post">
      <input id="register_button" class="button" type="submit" value="Register">
    </form>
  </div>
</body>