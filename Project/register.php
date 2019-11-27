<?php 
    include_once('includes/start.php');
    include_once('database/db_user.php');

   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];
   $mypasswordConfirmation = $_POST['passwordConfirmation'];

   if($mypassword != $mypasswordConfirmation){
      $error = "Your passwords must match\n";
      echo $error;
   }else{
      insertUser($myusername, $mypassword);
      header("Location: index.html");
   }

?> 
   <body>
	   <p> <a href="register.html">Try Again</a> </p>
   </body>