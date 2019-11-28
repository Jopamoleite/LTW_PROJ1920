<?include_once 'templates/header.php' ?>

<body>
  <header>
      <h1><a href="register.html">Register</a></h1>
  </header>
  <form action="register.php" method="post">
    <p><label>Username: <input type="text" name="username" id="username"></label></p>
    <p><label>Password: <input type="password" name="password" id="password"></label></p>
    <p><label>Confirm Password: <input type="password" name="passwordConfirmation" id="passwordConfirmation"></label></p>
    <input type="submit" value="Send">
  </form>
  <div id="leave_register">
    <a href="index.html">Back to Main Page</a>
    <a href="login.html">Login</a>
  </div>
</body>

<?include_once 'templates/footer.php' ?>
