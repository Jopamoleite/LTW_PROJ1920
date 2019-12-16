<?php
chdir('..');

include_once 'includes/start.php';
include_once 'database/user.php';

$password = $_POST['password'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['repeat'];

$password = trim(htmlspecialchars($password));
$newPassword = trim(htmlspecialchars($newPassword));
$confirmPassword = trim(htmlspecialchars($confirmPassword));

if (!isLoginCorrect($_SESSION['username'], $password)) {
 $error = 'Your old password is incorrect';
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/change_password_page.php');
 die();
}

if ($newPassword != $confirmPassword) {
 $error = 'Your passwords must match';
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/change_password_page.php');
 die();
}

$error = changePassword($_SESSION['userID'], $newPassword);

if ($error) {
 $_SESSION['infomsg'] = $error;
 header('Location: ../pages/change_password_page.php');
 die();
}

header('Location: ../pages/user_profile.php?user=' . $_SESSION['username']);
?>
