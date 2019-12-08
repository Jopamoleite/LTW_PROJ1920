<?
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
            $stmt = $dbh->prepare('INSERT INTO User_(username, password_, email) VALUES (?, ?, ?);');
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute(array($username, $hash, $email));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
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

    function getIdBio($myid){
        global $dbh;
        try{
            $stmt = $dbh->prepare('SELECT bio FROM User_ WHERE id = ?;');
            $stmt->execute(array($myid));
            $row = $stmt->fetch();
            $bio = $row['bio'];
            return $bio;
        }catch(PDOException $e){
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getIdMail($myid){
        global $dbh;
        try{
            $stmt = $dbh->prepare('SELECT email FROM User_ WHERE id = ?;');
            $stmt->execute(array($myid));
            $row = $stmt->fetch();
            $email = $row['email'];
            return $email;
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
