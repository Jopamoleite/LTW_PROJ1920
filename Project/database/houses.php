<?php

    function addHouse($title, $location, $address, $price_day, $capacity, $description, $ownerID){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES (?, ?, ?, ?, ?, ?, ?);');
            $stmt->execute(array($title, $location, $address, $price_day, $capacity, $description, $ownerID));
            $qry = 'SELECT * FROM Place WHERE address_ = ?;';
            $stmt = $dbh->prepare($qry);
            $stmt->execute(array($address));
            $row = $stmt->fetch();
            $placeID = $row['id'];
            return $placeID;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getHousesAtLocation($location, $guests){
        global $dbh;
        try {
            $qry = 'SELECT * FROM Place WHERE location LIKE ? COLLATE NOCASE AND capacity >= ? ORDER BY price_day ASC ;';
            $stmt = $dbh->prepare($qry);
            $stmt->execute(array("%".$location."%", $guests));
            return $stmt;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getHousesWithGuests($guests){
        global $dbh;
        try {
            $qry = 'SELECT * FROM Place WHERE capacity >= ? COLLATE NOCASE ORDER BY price_day ASC;';
            $stmt = $dbh->prepare($qry);
            $stmt->execute(array($guests));
            return $stmt;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getHouseWithOwnerID($id){
        global $dbh;
        try {
            $qry = 'SELECT * FROM Place WHERE ownerID = ? ORDER BY price_day ASC;';
            $stmt = $dbh->prepare($qry);
            $stmt->execute(array($id));
            return $stmt;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }
    
    function checkHouse($house_id){
        global $dbh;
        try {
            $stmt = $dbh->prepare('SELECT * FROM Place WHERE id = ?;');
            $stmt->execute(array($house_id));
            $table = $stmt->fetchAll();
            if(sizeof($table) != 1) return false;
            return true;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }
    
    function getHousePhotos($house_id){
        global $dbh;
        try {
            $stmt = $dbh->prepare('SELECT * FROM PlaceImages WHERE placeID = ?;');
            $stmt->execute(array($house_id));
            $photos = $stmt->fetch();
            return $photos;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function addPhotoToHouse($image, $house_id){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO PlaceImages(image_name, placeID) VALUES (?, ?);');
            $stmt->execute(array($image, $house_id));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getHouse($house_id){
        global $dbh;
        try {
            $stmt = $dbh->prepare('SELECT * FROM Place WHERE id = ?;');
            $stmt->execute(array($house_id));
            $house = $stmt->fetch();
            return $house;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }
?>
