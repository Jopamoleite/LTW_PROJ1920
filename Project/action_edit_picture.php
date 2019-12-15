<?php
    include_once 'includes/start.php';
    include_once 'database/db_user.php';

    $extensions = ['jpeg','jpg','png', 'jfif'];

    $fileName = $_FILES['picture']['name'];
    $fileSize = $_FILES['picture']['size'];
    $fileTmpName  = $_FILES['picture']['tmp_name'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    if (isset($_POST['submit'])) {

        if (!in_array($fileExtension,$extensions)) {
            $_SESSION['errormsg'] = "Please upload a jpeg or png file ";
            header('Location: user_profile_page.php?user='.$_SESSION['username']);
            die();
        }

        if ($fileSize > 3000000) {
            $_SESSION['errormsg'] = "Please upload a file with less than 3MB";
            header('Location: user_profile_page.php?user='.$_SESSION['username']);
            die();
        }

        $currentDate = date("Y-m-d");
        $randomNumber = rand();

        $newName = sha1($_SESSION['userID'] . $currentDate . $randomNumber) . "." . $fileExtension;

        $uploadPath = "images/" . $newName;

        $uploadSuccess = move_uploaded_file($fileTmpName, $uploadPath);

        if (!$uploadSuccess) {
            $_SESSION['errormsg'] = "Error uploading file! ";
        }else{
            $oldPhoto = getUserPhoto($_SESSION['username']);
            editPhoto($_SESSION['userID'], $newName);
            if($oldPhoto != "default_pic.bmp") unlink("images/".$oldPhoto);
        }

    }

    header('Location: user_profile_page.php?user='.$_SESSION['username']);

?>
