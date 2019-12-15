<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/user.php';

$type = $_GET['type'];
$value = $_GET['value'];

if ($type == "user") {
 if (checkUser($value)) {
  echo "User already exists";
 } else {
  echo "Valid";
 }
} elseif ($type == "email") {
 if (checkEmail($value)) {
  echo "Email already exists";
 } else {
  echo "Valid";
 }
}
