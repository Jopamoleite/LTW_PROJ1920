<?php
$path = getcwd();
chdir('../..');
include_once 'includes/session.php';
include_once 'includes/utils.php';
include_once 'database/connect.php';
chdir($path);
