<?php 
    include_once('includes/start.php');
    include_once('database/db_user.php');

   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];
   $repeatPass = $_POST['passwordConfirmation'];

   if (!empty($myusername) && !empty($mypassword)&& !empty($repeatPass)) {

      $myusername = trim(htmlspecialchars($myusername));
      $mypassword = trim(htmlspecialchars($mypassword));
      $repeatPass = trim(htmlspecialchars($repeatPass));
   
   }

   if($mypassword != $repeatPass){
      $error = "Your passwords must match\n";
      $_SESSION["errormsg"] = $error;
      header("Location: register.php");
   }else{
      $error = insertUser($myusername, $mypassword);

      if(strlen($error) != 0){
         $_SESSION["errormsg"] = $error;
         header("Location: register.php");
      }else{
         header("Location: index.php");
      }
   }

?>