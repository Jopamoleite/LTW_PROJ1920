<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/user.php';

$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$repeatPass = $_POST['repeat'];
$myemail = $_POST['email'];

if (!empty($myusername) && !empty($mypassword) && !empty($repeatPass) && !empty($myemail)) {
 $myusername = trim(htmlspecialchars($myusername));
 $mypassword = trim(htmlspecialchars($mypassword));
 $repeatPass = trim(htmlspecialchars($repeatPass));
 $myemail = trim(htmlspecialchars($myemail));
}

$_SESSION['infomsg'] = "";

/* Validate username */
if (strlen($myusername) < 4) {
 $error = "Username too short.";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}
if (!preg_match('/[\w]+/', $myusername)) {
 $error = "Invalid username.";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}
if (checkUser($myusername)) {
 $error = "User already exists.";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}

/* Validate email */
if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
 $error = "Invalid email format";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}
if (checkEmail($myemail)) {
 $error = "Email already used.";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}

/* Validate password and repeat */
if (strlen($mypassword) < 8) {
 $error = "Password too short.";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}
if ($mypassword != $repeatPass) {
 $error = 'Your passwords must match';
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}

/* Insert user */
$error = insertUser($myusername, $mypassword, $myemail);
if ($error) {
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/register_page.php');
 die();
}

header('Location: ../index.php');
?>
