<?
    include_once 'includes/start.php';
    include_once 'database/db_user.php';

	$name = $_POST['name'];
	$location = $_POST['location'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
    $bio = $_POST['bio'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
        $_SESSION['errormsg'] = $error;
        header('Location: edit-profile.php');
        die();
    }

    $myname = trim(htmlspecialchars($name));
    $mylocation = trim(htmlspecialchars($location));
    $myphone = trim(htmlspecialchars($phone));
    $myemail = trim(htmlspecialchars($email));
    $mybio = trim(htmlspecialchars($bio));


    $error = updateUser($_SESSION['userID'], $myname, $mylocation, $myphone, $myemail, $mybio);
    if(!empty($error)){
        header('Location: edit-profile.php');
        die();
    }

    header('Location: user_profile.php?user='.$_SESSION['username']);

?>
