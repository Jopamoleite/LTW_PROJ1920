<?php

function addHouse($title, $location, $address, $price_day, $capacity, $description, $ownerID)
{
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

function getHouseReservations($id)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Reservations WHERE placeID = ?';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($id));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function addReservation($houseID, $touristID, $checkin, $checkout)
{
 global $dbh;
 try {
  $stmt = $dbh->prepare('INSERT INTO Reservations(placeID, touristID, begin_date, end_date) VALUES (?, ?, ?, ?);');
  $stmt->execute(array($houseID, $touristID, $checkin, $checkout));
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousesAtLocation($location, $guests)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place WHERE location LIKE ? COLLATE NOCASE AND capacity >= ? ORDER BY price_day ASC ;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array("%" . $location . "%", $guests));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousesWithGuests($guests)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place WHERE capacity >= ? ORDER BY price_day ASC;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($guests));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousesWithOneDate($date, $guests)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place Pl WHERE Pl.id NOT IN( SELECT placeID FROM Place P JOIN Reservations ON P.id = placeID WHERE date(?) >= date(begin_date) AND date(?) <= date(end_date)) AND capacity >= ? ORDER BY price_day ASC;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($date, $date, $guests));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousesWithOneDateAndLocation($location, $date, $guests)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place Pl WHERE Pl.id NOT IN( SELECT placeID FROM Place P JOIN Reservations ON P.id = placeID WHERE date(?) >= date(begin_date) AND date(?) <= date(end_date)) AND location LIKE ? COLLATE NOCASE  AND capacity >= ? ORDER BY price_day ASC;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($date, $date, $location, $guests));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousesWithTwoDates($date1, $date2, $guests)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place Pl WHERE Pl.id NOT IN( SELECT placeID FROM Place P JOIN Reservations ON P.id = placeID WHERE ((date(?) >= date(begin_date) AND date(?) <= date(end_date)) OR (date(?) >= date(begin_date) AND date(?) <= date(end_date)))) AND capacity >= ? ORDER BY price_day ASC;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($date1, $date1, $date2, $date2, $guests));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousesWithTwoDatesAndLocation($location, $date1, $date2, $guests)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place Pl WHERE Pl.id NOT IN( SELECT placeID FROM Place P JOIN Reservations ON P.id = placeID WHERE ((date(?) >= date(begin_date) AND date(?) <= date(end_date)) OR (date(?) >= date(begin_date) AND date(?) <= date(end_date)))) AND location LIKE ? COLLATE NOCASE AND capacity >= ? ORDER BY price_day ASC;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($date1, $date1, $date2, $date2, $location, $guests));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHouseWithOwnerID($id)
{
 global $dbh;
 try {
  $qry = 'SELECT * FROM Place WHERE ownerID = ? ORDER BY price_day ASC;';
  $stmt = $dbh->prepare($qry);
  $stmt->execute(array($id));
  $table = $stmt->fetchAll();
  return $table;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function checkHouse($house_id)
{
 global $dbh;
 try {
  $stmt = $dbh->prepare('SELECT * FROM Place WHERE id = ?;');
  $stmt->execute(array($house_id));
  $table = $stmt->fetchAll();
  if (sizeof($table) != 1) {
   return false;
  }

  return true;
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHousePhotos($house_id)
{
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

function addPhotoToHouse($image, $house_id)
{
 global $dbh;
 try {
  $stmt = $dbh->prepare('INSERT INTO PlaceImages(image_name, placeID) VALUES (?, ?);');
  $stmt->execute(array($image, $house_id));
 } catch (PDOException $e) {
  error_log('Error: ' . $e->getMessage());
 }
}

function getHouse($house_id)
{
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