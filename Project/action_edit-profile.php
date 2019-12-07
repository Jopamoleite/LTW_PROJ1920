<?
    include_once 'includes/start.php';
    include_once 'database/db_user.php';

	$location = $_POST['location'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
    $bio = $_POST['bio'];

    $bioError = editBio($_SESSION['userID'], $bio);
    if(!empty($bioError)){
        $_SESSION['errormsg'] = $bioError;
        header('Location: edit-profile.php');
    }

    $emailError = editEmail($_SESSION['userID'], $email);
    if(!empty($emailError)){
        $_SESSION['errormsg'] = $emailError;
        header('Location: edit-profile.php');
    }

    header('Location: user_profile.php')

?>
