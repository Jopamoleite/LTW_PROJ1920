<?php
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
