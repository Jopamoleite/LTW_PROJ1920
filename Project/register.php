<?include_once 'templates/header.php' ?>

<body>
  <div class="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <form action="register.php" method="post">
      <div align="left">
        <label>Username: <input type="text" name="username" id="username"></label>
        <br><label>Password: <input type="password" name="password" id="password"></label>
        <br><label>Confirm Password: <input type="password" name="passwordConfirmation" id="passwordConfirmation"></label>
      </div>
      <input type="submit" value="Send">
    </form>
  </div>
</body>

<?include_once 'templates/footer.php' ?>
