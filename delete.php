<?php
require_once 'config.php';
session_start();
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Establish connection to MySQL database
    $conn = getDBConnection();

    // Disable foreign key checks temporarily
    mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=0');

    // Delete the user account from the database
    $sql = "DELETE FROM users WHERE user_id = $user_id";
    if(mysqli_query($conn, $sql)) {
        echo "Account deleted successfully";
        // After deleting account, you may want to clear session and redirect to login page
        session_destroy();
        header("Location: login.html");
        exit();
    } else {
        echo "Error deleting account: " . mysqli_error($conn);
    }

    // Enable foreign key checks again
    mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS=1');

    // Close the database connection
    mysqli_close($conn);
} else {
    header("Location: login.html");
    exit();
}
?>
