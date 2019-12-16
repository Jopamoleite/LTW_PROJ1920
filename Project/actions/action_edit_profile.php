<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/user.php';

$username = $_POST['username'];
$name = $_POST['name'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$bio = $_POST['bio'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error = "Invalid email format";
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/edit_profile.php');
 die();
}

$myusername = trim(htmlspecialchars($username));
$myname = trim(htmlspecialchars($name));
$mylocation = trim(htmlspecialchars($location));
$myphone = trim(htmlspecialchars($phone));
$myemail = trim(htmlspecialchars($email));
$mybio = trim(htmlspecialchars($bio));

$error = updateUser($_SESSION['userID'], $myusername, $myname, $mylocation, $myphone, $myemail, $mybio);
if (!empty($error)) {
 header('Location: ../pages/edit_profile.php');
 die();
}

setUser($myusername);

header('Location: ../pages/user_profile.php?user=' . $_SESSION['username']);
