<?php
<<<<<<< HEAD
  $path = getcwd();
  chdir('../..');
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  chdir($path);
=======
include_once $_SERVER['DOCUMENT_ROOT'].'/includes/start.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/database/db_user.php';
>>>>>>> 0408c29637f23e3abe5a9d5a3ec53a228a046d00

  $type = $_GET['type'];
  $value = $_GET['value'];

  if($type == "user"){
    if(checkUser($value)){
      echo "User already exists";
    } else {
      echo "Valid";
    }
  } else if($type == "email"){
    if(checkEmail($value)){
      echo "Email already exists";
    } else {
      echo "Valid";
    }
  }
?>
