<?php

    function addHouse($title, $address, $price_day, $capacity, $description, $ownerID){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO Place(title, address_, price_day, capacity, description, ownerID) VALUES (?, ?, ?, ?, ?, ?);');
            $stmt->execute(array($title, $address, $price_day, $capacity, $description, $ownerID));
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }

    function getAllHouses(){
        global $dbh;
        try {
            $qry = 'SELECT * FROM Place;';
            $stmt = $dbh->prepare($qry);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
        }
    }
?>
