<?php
  include_once('includes/start.php');

  unsetUser();

  session_destroy();
  
  header("Location: index.php");
?>
