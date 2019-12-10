<?
    include_once 'includes/start.php';
    include_once 'database/db_user.php';

	$name = $_POST['name'];
	$location = $_POST['location'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
    $bio = $_POST['bio'];


    $error = updateUser($_SESSION['userID'], $name, $location, $phone, $email, $bio);
    if(!empty($error)){
        $_SESSION['errormsg'] = $error;
        header('Location: edit-profile.php');
    }

    header('Location: user_profile.php?user='.$_SESSION['username']);

?>
