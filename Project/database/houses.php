<?php

    function addHouse($title, $location, $address, $price_day, $capacity, $description, $ownerID){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO Place(title, location, address_, price_day, capacity, description, ownerID) VALUES (?, ?, ?, ?, ?, ?, ?);');
            $stmt->execute(array($title, $location, $address, $price_day, $capacity, $description, $ownerID));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getHousesAtLocation($location, $guests){
        global $dbh;
        try {
            $qry = 'SELECT * FROM Place WHERE location = ? COLLATE NOCASE AND capacity >= ? ORDER BY price_day ASC ;';
            $stmt = $dbh->prepare($qry);
            $stmt->execute(array($location, $guests));
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
?>
