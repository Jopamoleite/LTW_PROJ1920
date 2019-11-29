<?php 
    session_start();

    function setUser($username){
        $_SESSION['username'] = $username;
    }
    
    function unsetUser(){
        $_SESSION['username'] = "";
    }

?>