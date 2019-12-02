<?php 

    function addHouse($title, $address, $price_day, $capacity, $description, $ownerID){
        global $dbh;
        try {
            $stmt = $dbh->prepare('INSERT INTO Place(title, address_, price_day, capacity, description_, ownerID) 
                                   VALUES (?, ?, ?, ?, ?, ?)');

            $stmt->execute(array($title, $address, $price_day, $capacity, $description, $ownerID));
            return "";
        } catch (PDOException $e) { 
            return "House with that address already registered";
        }
    }

?>