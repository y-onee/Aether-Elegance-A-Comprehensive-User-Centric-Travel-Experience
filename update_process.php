<?php
session_start();

if(isset($_SESSION['user_id']) && isset($_POST['username']) && isset($_POST['email'])) {
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $update_password = false;

    if(isset($_POST['old_password']) && isset($_POST['new_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $update_password = true;
    }

    // Connect to the database
    require_once 'config.php';
    $conn = getDBConnection();

    // Fetch user's current username and email
    $sql = "SELECT username, email, pass FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $current_username = $row['username'];
        $current_email = $row['email'];
        $current_password = $row['pass'];

        // Check if username or email has changed
        if($username !== $current_username || $email !== $current_email) {
            $update_sql = "UPDATE users SET username = '$username', email = '$email' WHERE user_id = $user_id";
            if(mysqli_query($conn, $update_sql)) {
                echo "Username and/or email updated successfully.";
            } else {
                echo "Error updating username and/or email: " . mysqli_error($conn);
            }
        }

        // Check if password update is requested
        if($update_password) {
            // Verify old password
            if($old_password === $current_password) {
                // Update the user's password
                $update_password_sql = "UPDATE users SET pass = '$new_password' WHERE user_id = $user_id";
                if(mysqli_query($conn, $update_password_sql)) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                echo "Old password is incorrect.";
            }
            header('Location: account.php');
        }
    } else {
        echo "User not found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>
