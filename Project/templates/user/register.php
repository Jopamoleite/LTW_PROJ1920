<?include_once('database/db_user.php') ?>

<body>
  <div id="main">
    <h1><a href="index.php">HouseHunt</a></h1>
    <form action="insert_user.php" method="post">
      <div>
        <label>Username: <input type="text" name="username" id="username" placeholder="Username" required></label>
        <br><label>Password: <input type="password" name="password" id="password" placeholder="Password" required></label>
        <br><label>Repeat Password: <input type="password" name="repeat" id="repeat" placeholder="Repeat" required></label>
      </div>
      <input type="submit" value="Send">
    </form>
  </div>
  <div id='alert_msg'>
    <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
  </div> 
</body>