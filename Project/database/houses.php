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
