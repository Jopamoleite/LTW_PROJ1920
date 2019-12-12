<?php
    include_once 'includes/start.php';
    include_once 'database/db_user.php';

   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];
   $repeatPass = $_POST['repeat'];
   $myemail    = $_POST['email'];

   if (!empty($myusername) && !empty($mypassword) && !empty($repeatPass) && !empty($myemail)) {
      $myusername = trim(htmlspecialchars($myusername));
      $mypassword = trim(htmlspecialchars($mypassword));
      $repeatPass = trim(htmlspecialchars($repeatPass));
      $myemail    = trim(htmlspecialchars($myemail));
   }

   $_SESSION['errormsg'] = "";

   /* Validate username */
   if (strlen($myusername) < 4) {
      $error = "Username too short.";
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }
   if (!preg_match('/[\w]+/', $myusername)) {
      $error = "Invalid username.";
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }
   if (checkUser($myusername)) {
      $error = "User already exists.";
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }

   /* Validate email */
   if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
      $error = "Invalid email format";
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }
   if (checkEmail($myemail)) {
      $error = "Email already used.";
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }

   /* Validate password and repeat */
   if (strlen($mypassword) < 8) {
      $error = "Password too short.";
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }
   if($mypassword != $repeatPass) {
      $error = 'Your passwords must match';
      $_SESSION["errormsg"] = $error;
      header('Location: register_page.php');
   }

   /* Insert user */
   $error = insertUser($myusername, $mypassword, $myemail);
   if($error) {
      $_SESSION["errormsg"] = $error;
      header('Location: register_page.php');
   }

   header('Location: index.php');
?>
