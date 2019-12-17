<?php
  include_once 'includes/start.php';
  include_once 'database/user.php';

  if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) {
    header("Location: main_page.php");
  }

  if (empty($_POST)) {
    print_body();
  } else {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    validate_login($myusername, $mypassword);
  }
?>

<?php
  function validate_login($myusername, $mypassword) {
    if (!empty($myusername) && !empty($mypassword)) {
      $myusername = trim(htmlspecialchars($myusername));
      $mypassword = trim(htmlspecialchars($mypassword));
    }

    if (isLoginCorrect($myusername, $mypassword)) {
      setUser($myusername);
      $myID = getUserId($myusername);
      setID($myID);
      header('Location: main_page.php');
    } else {
      $error = 'Invalid credentials';
      $_SESSION['infomsg'] = $error;
      header('Location: ../index.php');
    }
  }
?>

<?php function print_body() { ?>
  <body>
    <div class="main">
      <h1><a href="../index.php">HouseHunt</a></h1>
      <h2>The hunt is on!</h2>
      <form id="login_form" action="" method="post">
        <p><label><input id="username_input" type="text" name="username" id="username" maxlength="20" placeholder="   Username" required></label></p>
        <p><label><input id="password_input" type="password" name="password" id="password" maxlength="20" placeholder="   Password" required></label></p>
        <input id="login_button" class="button" type="button" onclick="login()" value="Login">
      </form>
      <form id="register_button_form" action="register_page.php" method="post">
        <input id="register_button" name="submit" class="button" type="submit" value="Register">
      </form>
      <div id="error_all"></div>
    </div>
  </body>
<?php } ?>
<script src="../js/login.js" defer></script>
