<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect back to homepage
header("Location: ../../Frontend/login.html");
exit();
?>