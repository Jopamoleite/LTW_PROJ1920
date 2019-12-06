<?php

    function addHouse($title, $address, $price_day, $capacity, $description, $ownerID){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO Place(title, address_, price_day, capacity, description_, ownerID) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($title, $address, $price_day, $capacity, $description, $ownerID));
            return "";
        } catch (PDOException $e) {
            return "Error inserting house.\r\n" . $e->getMessage();
        }
    }

    function getAllHouses(){
        global $dbh;
        try {
            $qry = "SELECT * FROM Place";
            $stmt = $dbh->prepare($qry);
            $result = $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            return "Error selecting all houses.\r\n" . $e->getMessage();
        }
    }
?>
