<?php
  $dbh = new PDO('sqlite:'.$_SERVER['DOCUMENT_ROOT'].'/database/database.db');
  $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->query('PRAGMA foreign_keys = ON');
?>
