<?
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
      $myemail = trim(htmlspecialchars($myemail));

   }

   if($mypassword != $repeatPass){
      $error = 'Your passwords must match';
      $_SESSION['errormsg'] = $error;
      header('Location: register_page.php');
   }else{
      $error = insertUser($myusername, $mypassword, $myemail);

      if($error){
         $_SESSION['errormsg'] = $error;
         header('Location: register_page.php');
      }else{
         header('Location: index.php');
      }
   }

   header('Location: index.php');
?>
