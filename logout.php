<?php
session_start();

//  session data clear
$_SESSION = [];

// session destroy
session_destroy();

// redirect
header("Location: login.php");
exit();
?>