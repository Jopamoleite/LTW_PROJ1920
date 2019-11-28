<?php 
   $myusername = $_POST['username'];
   $mypassword = $_POST['password'];

   include_once('includes/start.php');
   include_once('database/db_user.php');

   if(isLoginCorrect($myusername, $mypassword)){
      setUser($myusername);
      header("Location: index.html");
   }

?>

   <body>
	   <a href="login.html">Invalid credentials</a>
   </body>