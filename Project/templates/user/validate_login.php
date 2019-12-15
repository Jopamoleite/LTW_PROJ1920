<?php
   include_once $_SERVER['DOCUMENT_ROOT'].'/includes/start.php';
   include_once $_SERVER['DOCUMENT_ROOT'].'/database/db_user.php';

   $myusername = $_GET['username'];
   $mypassword = $_GET['password'];

   if (!empty($myusername) && !empty($mypassword)) {
      $myusername = trim(htmlspecialchars($myusername));
      $mypassword = trim(htmlspecialchars($mypassword));
   }

   if(isLoginCorrect($myusername, $mypassword)){
      echo "Valid";
   }
?>
