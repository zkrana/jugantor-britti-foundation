<?php
// Define site-wide constants
define('SITE_NAME', 'Jugantor Britti Foundation');

// Determine the base URL dynamically based on the environment
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    define('BASE_URL', 'http://localhost/jugantor-britti-foundation/');
} else {
    define('BASE_URL', 'http://jugantor-britti-foundation.test/jugantor-britti-foundation/');
}

// Error reporting (turn off in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>