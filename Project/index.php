<? include_once("templates/header.php") ?>

<body>
  <header>
    <h1><a href="index.html">HouseHunt</a></h1>
    <form action="login.php" method="post">
          <p><label>Username: <input type="text" name="username" id="username"></label></p>
          <p><label>Password: <input type="password" name="password" id="password"></label></p>
          <button id="loginbutton" type="submit" value="Login">
    </form>
  </header>
  <div id="signup">
      <a href="register.html">Register</a>
  </div>
</body>

<? include_once("templates/footer.php") ?>
