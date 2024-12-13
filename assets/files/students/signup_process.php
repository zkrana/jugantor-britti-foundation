<?php
session_start(); // Start the session to store messages

// Include the configuration file to access BASE_URL
include_once('../config/config.php'); 
include_once('../config/db.php'); // Database connection

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $father_name = sanitize_input($_POST['father-name']);
    $mother_name = sanitize_input($_POST['mother-name']);
    $school_name = sanitize_input($_POST['school-name']);
    $class_name = (int) $_POST['class-name']; 
    $roll_no = sanitize_input($_POST['roll-no']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header('Location: ' . BASE_URL . 'students/signup.php'); // Redirect back to signup.php
        exit;
    }

    // Password validation
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match!";
        header('Location: ' . BASE_URL . 'students/signup.php'); // Redirect back to signup.php
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Photo upload handling
    if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photo_name = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_ext = pathinfo($photo_name, PATHINFO_EXTENSION);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate file type
        if (!in_array($photo_ext, $allowed_extensions)) {
            $_SESSION['error'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
            header('Location: ' . BASE_URL . 'students/signup.php'); // Redirect back to signup.php
            exit;
        }

        // Generate a unique file name and move the file to the target directory
        $photo_new_name = uniqid('photo_') . '.' . $photo_ext;
        $target_dir = '../uploads/students/';
        
        // Create the necessary directories based on the school name and class name
        $school_dir = $target_dir . $school_name;
        $class_dir = $school_dir . '/Class_' . $class_name;
        
        if (!is_dir($class_dir)) {
            mkdir($class_dir, 0777, true); // Create the directories if they do not exist
        }

        // Attempt to move the uploaded file
        if (!move_uploaded_file($photo_tmp, $class_dir . '/' . $photo_new_name)) {
            $_SESSION['error'] = "Failed to upload photo.";
            header('Location: ' . BASE_URL . 'students/signup.php'); // Redirect back to signup.php
            exit;
        }
    } else {
        $_SESSION['error'] = "No photo uploaded or error during upload.";
        header('Location: ' . BASE_URL . 'students/signup.php'); // Redirect back to signup.php
        exit;
    }

    // Check if email already exists
    $check_email = "SELECT * FROM student_signup WHERE email=?";
    $stmt_check = $conn->prepare($check_email);
    $stmt_check->bindValue(1, $email, PDO::PARAM_STR); // Using bindValue for PDO
    $stmt_check->execute();
    $result = $stmt_check->fetch();
    
    if ($result) {
        $_SESSION['error'] = "Email already registered!";
        header('Location: ' . BASE_URL . 'students/signup.php'); // Redirect back to signup.php
        exit;
    }

    // Prepare and bind the SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO student_signup (name, email, phone, father_name, mother_name, school_name, class_name, roll_no, password, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindValue(1, $name, PDO::PARAM_STR);
    $stmt->bindValue(2, $email, PDO::PARAM_STR);
    $stmt->bindValue(3, $phone, PDO::PARAM_STR);
    $stmt->bindValue(4, $father_name, PDO::PARAM_STR);
    $stmt->bindValue(5, $mother_name, PDO::PARAM_STR);
    $stmt->bindValue(6, $school_name, PDO::PARAM_STR);
    $stmt->bindValue(7, $class_name, PDO::PARAM_INT);
    $stmt->bindValue(8, $roll_no, PDO::PARAM_STR);
    $stmt->bindValue(9, $hashed_password, PDO::PARAM_STR);
    $stmt->bindValue(10, $photo_new_name, PDO::PARAM_STR); // Insert the uploaded photo filename

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Registration successful!";
    } else {
        $_SESSION['error'] = "Error: " . $stmt->errorInfo()[2];
    }

    // Redirect back to signup page
    header('Location: ' . BASE_URL . 'students/signup.php');
    exit;
}