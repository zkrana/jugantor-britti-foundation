<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ../students/index.php'); // Default to student login, adjust if necessary
        exit;
    }
}

function logout() {
    session_unset();
    session_destroy();
    header('Location: ../../../index.php');
    exit;
}
