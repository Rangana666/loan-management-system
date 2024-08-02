<?php
session_start();

// Clear all output buffers
ob_clean();

// Set no cache headers
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Unset all session variables
$_SESSION = array();

// Regenerate the session ID
session_regenerate_id(true);

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();
?>
