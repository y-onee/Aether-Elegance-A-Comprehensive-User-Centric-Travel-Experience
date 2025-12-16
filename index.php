<?php
require_once 'config.php';

// Start session to check authentication
if (!isset($_SESSION)) {
    session_start();
}

// Check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, redirect to first.php (main page)
    header('Location: first.php');
    exit;
} else {
    // User is not logged in, redirect to login.php
    header('Location: login.php');
    exit;
}
?>
