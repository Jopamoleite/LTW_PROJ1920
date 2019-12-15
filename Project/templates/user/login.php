<?php
  include_once 'includes/start.php';
  include_once 'database/db_user.php';

  if(isset($_SESSION['userID']) && !empty($_SESSION['userID'])){
    header("Location: /main_page.php");
  }

  if(!isset($_POST['username']) || !isset($_POST['password'])){
    print_body();
  } else if(isset($_POST['username']) && isset($_POST['password'])) {
   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];

   if (!empty($myusername) && !empty($mypassword)) {
      $myusername = trim(htmlspecialchars($myusername));
      $mypassword = trim(htmlspecialchars($mypassword));
   }

   if(isLoginCorrect($myusername, $mypassword)){
      setUser($myusername);
      $myID = getUserId($myusername);
      setID($myID);
      header('Location: main_page.php');
   }else{
      $error = 'Invalid credentials';
      $_SESSION["errormsg"] = $error;
      header('Location: index.php');
   }
  }

function validate_login($myusername, $mypassword){
  if (!empty($myusername) && !empty($mypassword)) {
    $myusername = trim(htmlspecialchars($myusername));
    $mypassword = trim(htmlspecialchars($mypassword));
  }

  if(isLoginCorrect($myusername, $mypassword)){
    setUser($myusername);
    $myID = getUserId($myusername);
    setID($myID);
    header('Location: main_page.php');
  }else{
    $error = 'Invalid credentials';
    $_SESSION["errormsg"] = $error;
    header('Location: index.php');
  }
}


function print_body(){
  echo '
    <body>
      <div class="main">
        <h1><a href="index.php">HouseHunt</a></h1>
        <h2>The hunt is on!</h2>
        <form id="login_form" action="" method="post">
          <p><label><input id="username_input" type="text" name="username" id="username" maxlength="20" placeholder="   Username" required></label></p>
          <p><label><input id="password_input" type="password" name="password" id="password" maxlength="20" placeholder="   Password" required></label></p>
          <input id="login_button" class="button" type="submit" value="Login">
        </form>
        <form id="register_button_form" action="register_page.php" method="post">
          <input id="register_button" class="button" type="submit" value="Register">
        </form>
        <div class="alert_msg">';


  if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])) {
    echo $_SESSION["errormsg"];
    unset($_SESSION["errormsg"]);
  }
  echo '
        </div>
      </div>
    </body>';
}


?>
