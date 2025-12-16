<?php
require_once 'config.php';
session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $conn = getDBConnection();
        if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['pass'])) {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$pass')";
            
            $query = mysqli_query($conn,$sql);
            if($query) {
                echo "Entry Successful";
                header('Location: login.html');
                exit;
            }
            else {
                echo "Error Occurred";
            } 
        }
    }
?>
