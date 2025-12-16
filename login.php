<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $conn = getDBConnection();
    if (isset($_POST['username']) && isset($_POST['pass'])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['pass'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id']; // Store user ID in session
                $_SESSION['uname'] = $username;
                setcookie("user", $username, time() + (86400 * 30), "/");

                header('Location: first.php');
                exit;
            } else {
                echo "Invalid username or password";
            }
        } else {
            echo "Invalid username or password";
        }
    }
}
?>
