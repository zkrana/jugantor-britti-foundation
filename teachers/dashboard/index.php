<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header('Location: login_student.php');
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
    <p>Logged in as: Student</p>
    <a href="logout.php">Logout</a>
</body>
</html>
