<?php
  $path = getcwd();
  chdir('../..');
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  chdir($path);

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
