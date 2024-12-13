<?php
// Define the BASE_URL constant
define('BASE_URL', 'http://jugantor-britti-foundation.test/jugantor-britti-foundation/');

// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the login page after logout
header('Location: ' . BASE_URL . 'students/index.php');
exit;