<?php
session_start();
include 'db_connection.php'; // Add your DB connection script here.

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Validate inputs
if (empty($email) || empty($password)) {
    die('Email and Password are required.');
}

// Query based on role
if ($role == 'admin_teacher') {
    $query = "SELECT * FROM users WHERE email = ? AND (role = 'admin' OR role = 'teacher')";
} elseif ($role == 'student') {
    $query = "SELECT * FROM users WHERE email = ? AND role = 'student'";
} else {
    die('Invalid role.');
}

// Check credentials
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] == 'student') {
            header('Location: dashboard_student.php');
        } else {
            header('Location: dashboard_admin.php');
        }
        exit;
    } else {
        die('Invalid password.');
    }
} else {
    die('Invalid email or role.');
}
