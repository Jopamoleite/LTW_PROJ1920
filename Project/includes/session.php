<?php
  session_start();

  function setUser($username) {
    $_SESSION['username'] = $username;
  }

  function unsetUser() {
    $_SESSION['username'] = "";
  }

  function setID($id) {
    $_SESSION['userID'] = $id;
  }

  function unsetID() {
    $_SESSION['userID'] = "";
  }

  function echo_error() {
    if(isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])) {
      echo "<div class='error_message'>" . $_SESSION['errormsg'] . "</div>";
      unset($_SESSION['errormsg']);
    }
  }
  
  function echo_info() {
    if(isset($_SESSION['infomsg']) && !empty($_SESSION['infomsg'])) {
      echo "<div class='info_message'>" . $_SESSION['infomsg'] . "</div>";
      unset($_SESSION['infomsg']);
    }
  }
?>
