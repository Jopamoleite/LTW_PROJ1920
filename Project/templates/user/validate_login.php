<?php
$path = getcwd();
chdir('../..');
include_once 'includes/start.php';
include_once 'database/db_user.php';
chdir($path);

$myusername = $_GET['username'];
$mypassword = $_GET['password'];

if (!empty($myusername) && !empty($mypassword)) {
 $myusername = trim(htmlspecialchars($myusername));
 $mypassword = trim(htmlspecialchars($mypassword));
}

if (isLoginCorrect($myusername, $mypassword)) {
 echo "Valid";
}
