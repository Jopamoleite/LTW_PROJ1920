<?php 
    include_once('includes/start.php');

    function insertUser($username, $password){
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO User_(username,password_) VALUES (?, ?)');

        $options = ['cost' => 12];

        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options)));
    }


?>