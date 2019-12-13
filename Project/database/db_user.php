<?php
    function isLoginCorrect($username, $password) {
        global $dbh;
        try{
            $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ?;');
            $stmt->execute(array($username));
            $row = $stmt->fetch();
            $storedPassword = $row['password_'];
            $valid = password_verify($password, $storedPassword);
            return $valid;
        }catch(PDOException $e){
            error_log('Error: ' . $e->getMessage());
        }
    }

    function insertUser($username, $password, $email){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO User_(username, password_, email, image_name) VALUES (?, ?, ?, ?);');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $success = $stmt->execute(array($username, $hash, $email, 'default_pic.bmp'));
            if($success) return "";
            return "Failed to register.";
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return "Failed to register.";
        }
    }

    function getUserId($myusername){
        global $dbh;
        try{
            $stmt = $dbh->prepare('SELECT id FROM User_ WHERE username = ?;');
            $stmt->execute(array($myusername));
            $row = $stmt->fetch();
            $id = $row['id'];
            return $id;
        }catch(PDOException $e){
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getUserPhoto($myusername){
        global $dbh;
        try{
            $stmt = $dbh->prepare('SELECT image_name FROM User_ WHERE username = ?;');
            $stmt->execute(array($myusername));
            $row = $stmt->fetch();
            $image = $row['image_name'];
            return $image;
        }catch(PDOException $e){
            error_log('Error: ' . $e->getMessage());
        }
    }

    function editBio($myid, $bio){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET bio = ? WHERE id = ?;');
            $stmt->execute(array($bio, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function editEmail($myid, $email){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET email = ? WHERE id = ?;');
            $stmt->execute(array($email, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function editPhone($myid, $phone){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET phone_num = ? WHERE id = ?;');
            $stmt->execute(array($phone, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function editLocation($myid, $location){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET location_ = ? WHERE id = ?;');
            $stmt->execute(array($location, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function editName($myid, $name){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET name = ? WHERE id = ?;');
            $stmt->execute(array($name, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function updateUser($myid, $username, $name, $location, $phone, $mail, $bio){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET username = ?, name = ?, location_ = ?, phone_num = ?, email = ?, bio = ? WHERE id = ?;');
            $stmt->execute(array($username, $name, $location, $phone, $mail, $bio, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function changePassword($myid, $password){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_ SET password_ = ? WHERE id = ?;');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute(array($hash, $myid));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function checkUser($username){
        global $dbh;
        try {
            $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ?;');
            $stmt->execute(array($username));
            $table = $stmt->fetchAll();
            if(sizeof($table) != 1) return false;
            return true;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function checkEmail($email){
        global $dbh;
        try {
            $stmt = $dbh->prepare('SELECT * FROM User_ WHERE email = ?;');
            $stmt->execute(array($email));
            $table = $stmt->fetchAll();
            if(sizeof($table) != 1) return false;
            return true;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getUser($username){
        global $dbh;
        try {
            $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ?;');
            $stmt->execute(array($username));
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }
?>
