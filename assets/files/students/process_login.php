<?php
session_start();

// Include the database connection and config
include_once('../config/config.php');
include_once('../config/db.php');

// Sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_or_phone = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    // Define the table for students
    $table = 'student_signup';
    $dashboard_url = BASE_URL . 'students/dashboard/index.php';

    // Prepare the SQL query for the student table
    try {
        $stmt = $conn->prepare("SELECT * FROM $table WHERE (email = :email_or_phone OR phone = :email_or_phone) LIMIT 1");
        $stmt->bindParam(':email_or_phone', $email_or_phone, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // If the user exists and the password matches
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => 'student', // Hardcode the role as 'student' for student login
            ];

            // Redirect to the student dashboard
            header("Location: " . $dashboard_url);
            exit;
        } else {
            // If the user is not found or password doesn't match
            $_SESSION['error'] = "Invalid email/phone or password!";
            header("Location: " . BASE_URL . "students/index.php");
            exit;
        }
    } catch (PDOException $e) {
        // Database error
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        header("Location: " . BASE_URL . "students/index.php");
        exit;
    }
} else {
    // If the page is accessed without a POST request, redirect back to the login page
    $_SESSION['error'] = "Please login to access the dashboard.";
    header("Location: " . BASE_URL . "students/index.php");
    exit;
}