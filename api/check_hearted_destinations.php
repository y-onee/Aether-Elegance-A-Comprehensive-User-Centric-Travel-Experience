<?php
require_once '../config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["destination_id"])) {
    // Get the destination_id
    $destination_id = $_POST["destination_id"];
    
    // Check if user is logged in
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Establish connection to MySQL database
        $conn = getDBConnectionObject();

        // Check if the destination is already hearted by the user
        $check_sql = "SELECT * FROM favourites WHERE dest_id = $destination_id AND user_id = $user_id";
        $result = $conn->query($check_sql);
        
        if ($result->num_rows > 0) {
            echo "true"; // Destination is already favorited
        } else {
            echo "false"; // Destination is not favorited
        }

        $conn->close();
        exit();
    } else {
        echo "false"; // User not logged in, so not favorited
        exit();
    }
}
?>
