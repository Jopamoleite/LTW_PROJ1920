<?include_once "templates/common/header.php" ?>
<?include_once('database/db_user.php') ?>

<body>
  <div id="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <form action="login.php" method="post">
      <p><label>Username: <input type="text" name="username" id="username"></label></p>
      <p><label>Password: <input type="password" name="password" id="password"></label></p>
      <input class="button" type="submit" value="Login">
    </form>
  </div>
  <div id="main">
    <form action="register.php" method="post">
      <input class="button" type="submit" value="Register">
    </form>
  </div>
</body>

<?include_once "templates/common/footer.php" ?>
