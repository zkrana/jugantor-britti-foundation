<?php
session_start(); // Start session to store messages
include_once('../config/config.php'); // Include configuration
include_once('../config/db.php'); // Database connection

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize form data
    $role = sanitize_input($_POST['role']);
    $name = sanitize_input($_POST['fullname']);
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    $photo = $_FILES['photo'];

    // Additional fields for teachers
    $designation = $role === 'teacher' ? sanitize_input($_POST['designation']) : null;
    $school_name = $role === 'teacher' ? sanitize_input($_POST['school_name']) : null;
    $joining_date = $role === 'teacher' ? sanitize_input($_POST['joining_date']) : null;
    $experience = $role === 'teacher' ? sanitize_input($_POST['experience']) : null;

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header('Location: ' . BASE_URL . 'admin/signup.php');
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Handle photo upload
// Handle photo upload
if ($photo['error'] === UPLOAD_ERR_OK) {
    $photo_name = $photo['name'];
    $photo_tmp = $photo['tmp_name'];
    $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($photo_ext, $allowed_extensions)) {
        $_SESSION['error'] = "Invalid file type! Only JPG, JPEG, PNG, or GIF allowed.";
        header('Location: ' . BASE_URL . 'admin/signup.php');
        exit;
    }

    // Generate a unique file name
    $photo_new_name = uniqid('photo_') . '.' . $photo_ext;

    // Determine the target directory based on role
    $target_dir = ($role === 'teacher') ? '../uploads/teachers/' : '../uploads/admins/';

    // Create the directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Move the uploaded file
    if (!move_uploaded_file($photo_tmp, $target_dir . $photo_new_name)) {
        $_SESSION['error'] = "Photo upload failed!";
        header('Location: ' . BASE_URL . 'admin/signup.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Photo upload error!";
    header('Location: ' . BASE_URL . 'admin/signup.php');
    exit;
} 

    // Check if email exists in database
    $table = $role === 'admin' ? 'admins' : 'teachers';
    $check_query = "SELECT email FROM $table WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = "Email already registered!";
        header('Location: ' . BASE_URL . 'admin/signup.php');
        exit;
    }

    // Insert user into the database
    if ($role === 'admin') {
        $insert_query = "INSERT INTO admins (fullname, username, email, password, photo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->execute([$name, $username, $email, $hashed_password, $photo_new_name]);
    } else {
        $insert_query = "INSERT INTO teachers (fullname, username, email, password, photo, designation, school_name, joining_date, experience) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->execute([$name, $username, $email, $hashed_password, $photo_new_name, $designation, $school_name, $joining_date, $experience]);
    }

    // Check if insertion was successful
    if ($stmt) {
        $_SESSION['success'] = "Registration successful!";
        header('Location: ' . BASE_URL . 'admin/index.php');
    } else {
        $_SESSION['error'] = "Database error! Please try again.";
        header('Location: ' . BASE_URL . 'admin/signup.php');
    }
}
?>