<?php 

    function isLoginCorrect($username, $password) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ? AND password_ = ?');
       
        $stmt->execute(array($username, md5($password)));
        return $stmt->fetch() !== false;
    }

    function insertUser($username, $password){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO User_(username,password_) VALUES (?, ?)');
            $stmt->execute(array($username, md5($password)));
        } catch (PDOException $e) { 
            die("Username in use");
        }

    }

?>