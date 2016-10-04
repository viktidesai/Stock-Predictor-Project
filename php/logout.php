<?php
//Software Engineering Group-14

session_start();
session_destroy();
header('Location: login.php');
exit;

?>
