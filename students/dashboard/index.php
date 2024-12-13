<?php
// Define site-wide constants
define('SITE_NAME', 'Jugantor Britti Foundation');

// Determine the base URL dynamically based on the environment
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    define('BASE_URL', 'http://localhost/jugantor-britti-foundation/');
} else {
    define('BASE_URL', 'http://jugantor-britti-foundation.test/jugantor-britti-foundation/');
}

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to the login page if not logged in
    header('Location: ' . BASE_URL . 'students/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome to the Student Dashboard</h1>
    <p>Logged in as: <?php echo $_SESSION['user']['name']; ?></p> <!-- Displaying the user's name -->
    <a href="logout.php">Logout</a>
</body>
</html>