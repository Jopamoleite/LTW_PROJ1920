<?php 

    function isLoginCorrect($username, $password) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ?');
        
        $stmt->execute(array($username));
        $row = $stmt->fetch();
        $storedPassword = $row['password_'];

        $valid = password_verify($password, $storedPassword);

        return $valid;
    }

    function insertUser($username, $password, $email){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO User_(username, password_, email) VALUES (?, ?, ?)');

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt->execute(array($username, $hash, $email));
            return "";
        } catch (PDOException $e) { 
            return "username in use";
        }
    }

?>