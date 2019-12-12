<?php
    include_once 'includes/start.php';
    include_once 'database/db_user.php';

    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['repeat'];

    $password = trim(htmlspecialchars($password));
    $newPassword = trim(htmlspecialchars($newPassword));
    $confirmPassword = trim(htmlspecialchars($confirmPassword));

    if(!isLoginCorrect($_SESSION['username'], $password)){
      $error = 'Your old password is incorrect';
      $_SESSION["errormsg"] = $error;
      header('Location: change_password.php');
      die();
    }
 
    if($newPassword != $confirmPassword){
       $error = 'Your passwords must match';
       $_SESSION["errormsg"] = $error;
       header('Location: change_password.php');
       die();
    }
    
    $error = changePassword($_SESSION['userID'], $newPassword);

    if($error){
      $_SESSION["errormsg"] = $error;
      header('Location: change_password.php');
      die();
    }
    
    header('Location: user_profile.php?user='.$_SESSION['username']);
?>
