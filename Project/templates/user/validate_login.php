<?php
   include_once 'includes/start.php';
   include_once 'database/db_user.php';

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
      $error = 'Invalid credentials\n';
      $_SESSION["errormsg"] = $error;
      header('Location: index.php');
   }

?>
