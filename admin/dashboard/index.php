<?php
session_start();
if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'teacher')) {
    header('Location: login_admin_teacher.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin/Teacher Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin/Teacher Dashboard</h1>
    <p>Logged in as: <?php echo $_SESSION['role']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
