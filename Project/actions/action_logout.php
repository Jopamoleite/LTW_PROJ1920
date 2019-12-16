<?php
chdir('..');

include_once 'includes/start.php';

unsetUser();
unsetID();

session_destroy();

header('Location: ../index.php');
?>
