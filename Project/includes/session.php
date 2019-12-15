<?php
session_start();

function setUser($username)
{
 $_SESSION['username'] = $username;
}

function unsetUser()
{
 $_SESSION['username'] = "";
}

function setID($id)
{
 $_SESSION['userID'] = $id;
}

function unsetID()
{
 $_SESSION['userID'] = "";
}
