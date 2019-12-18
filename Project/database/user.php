<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ?;');
      $stmt->execute(array($username));
      if (!($row = $stmt->fetch())) {
      return false;
      }
      $storedPassword = $row['password_'];
      $valid = password_verify($password, $storedPassword);
      return $valid;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function insertUser($username, $password, $email) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('INSERT INTO User_(username, password_, email, image_name) VALUES (?, ?, ?, ?);');
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $success = $stmt->execute(array($username, $hash, $email, 'default_pic.bmp'));
      if ($success) {
      return "";
      }

      return "Failed to register.";
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
      return "Failed to register.";
    }
  }

  function getUserId($myusername) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT id FROM User_ WHERE username = ?;');
      $stmt->execute(array($myusername));
      $row = $stmt->fetch();
      $id = $row['id'];
      return $id;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function getUserPhoto($myusername) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT image_name FROM User_ WHERE username = ?;');
      $stmt->execute(array($myusername));
      $row = $stmt->fetch();
      $image = $row['image_name'];
      return $image;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function editPhoto($myid, $photo) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET image_name = ? WHERE id = ?;');
      $stmt->execute(array($photo, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function editBio($myid, $bio) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET bio = ? WHERE id = ?;');
      $stmt->execute(array($bio, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function editEmail($myid, $email) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET email = ? WHERE id = ?;');
      $stmt->execute(array($email, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function editPhone($myid, $phone) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET phone_num = ? WHERE id = ?;');
      $stmt->execute(array($phone, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function editLocation($myid, $location) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET location_ = ? WHERE id = ?;');
      $stmt->execute(array($location, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function editName($myid, $name) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET name = ? WHERE id = ?;');
      $stmt->execute(array($name, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function updateUser($myid, $username, $name, $location, $phone, $mail, $bio) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET username = ?, name = ?, location_ = ?, phone_num = ?, email = ?, bio = ? WHERE id = ?;');
      $stmt->execute(array($username, $name, $location, $phone, $mail, $bio, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function changePassword($myid, $password) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('UPDATE User_ SET password_ = ? WHERE id = ?;');
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $stmt->execute(array($hash, $myid));
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function checkUser($username) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT * FROM User_ WHERE username = ?;');
      $stmt->execute(array($username));
      $table = $stmt->fetchAll();
      if (sizeof($table) != 1) {
      return false;
      }

      return true;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function checkUserFromId($userID) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT * FROM User_ WHERE id = ?;');
      $stmt->execute(array($userID));
      $user = $stmt->fetch();
      return $user;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function checkEmail($email) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT * FROM User_ WHERE email = ?;');
      $stmt->execute(array($email));
      $table = $stmt->fetchAll();
      if (sizeof($table) != 1) {
      return false;
      }

      return true;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function getUser($username) {
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

  function getUserFromId($id) {
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT * FROM User_ WHERE id = ?;');
      $stmt->execute(array($id));
      $user = $stmt->fetch();
      return $user;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function getUserReservations($id) {
    global $dbh;
    try {
      $qry = 'SELECT * FROM Reservations WHERE touristID = ? AND date(?) <= date(end_date) ORDER BY begin_date, end_date;';
      $stmt = $dbh->prepare($qry);
      $stmt->execute(array($id, date("Y-m-d")));
      $table = $stmt->fetchAll();
      return $table;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }

  function getUserHousesReservations($id, $date) {
    global $dbh;
    try {
      $qry = 'SELECT * FROM Reservations R JOIN Place P ON R.placeID = P.id WHERE P.ownerID = ? AND date(end_date) >= date(?) ORDER BY begin_date ASC;';
      $stmt = $dbh->prepare($qry);
      $stmt->execute(array($id, $date));
      $table = $stmt->fetchAll();
      return $table;
    } catch (PDOException $e) {
      error_log('Error: ' . $e->getMessage());
    }
  }
?>
