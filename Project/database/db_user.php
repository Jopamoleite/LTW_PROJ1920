<?

    function isLoginCorrect($username, $password) {
        global $dbh;
        $stmt = $dbh->prepare('SELECT *
                               FROM User_
                               WHERE username = ?');

        $stmt->execute(array($username));
        $row = $stmt->fetch();
        $storedPassword = $row['password_'];

        $valid = password_verify($password, $storedPassword);

        return $valid;
    }

    function insertUser($username, $password, $email){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO User_(username, password_, email)
                                   VALUES (?, ?, ?)');

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt->execute(array($username, $hash, $email));
            return "";
        } catch (PDOException $e) {
            return "username in use";
        }
    }
    
    function getUserId($myusername){
        global $dbh;
        $stmt = $dbh->prepare('SELECT id
                               FROM User_
                               WHERE username = ?');

        $stmt->execute(array($myusername));
        $row = $stmt->fetch();

        $id = $row['id'];

        return $id;
    }

    function getIdBio($myid){
        global $dbh;
        $stmt = $dbh->prepare('SELECT bio
                               FROM User_
                               WHERE id = ?');

        $stmt->execute(array($myid));
        $row = $stmt->fetch();

        $bio = $row['bio'];

        return $bio;
    }
    function getIdMail($myid){
        global $dbh;
        $stmt = $dbh->prepare('SELECT email
                               FROM User_
                               WHERE id = ?');

        $stmt->execute(array($myid));
        $row = $stmt->fetch();

        $email = $row['email'];

        return $email;
    }

    function editBio($myid, $bio){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_
                                   SET bio = ?
                                   WHERE id = ?');

            $stmt->execute(array($bio, $myid));
            return "";
        } catch (PDOException $e) {
            return "error setting bio";
        }
    }

    function editEmail($myid, $email){
        global $dbh;
        try {
            $stmt = $dbh->prepare('UPDATE User_
                                   SET email = ?
                                   WHERE id = ?');

            $stmt->execute(array($email, $myid));
            return "";
        } catch (PDOException $e) {
            return "error setting bio";
        }
    }

?>
