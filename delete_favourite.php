<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["destination_id"])) {
    // Get the destination_id and user_id
    $destination_id = $_POST["destination_id"];
    
    // Check if user is logged in
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; // Assuming you have stored user_id in the session

        // Establish connection to MySQL database
        $conn = getDBConnectionObject();

        // Retrieve the id from favourites table based on dest_id and user_id
        $fetch_id_sql = "SELECT id FROM favourites WHERE dest_id = $destination_id AND user_id = $user_id";
        $result = $conn->query($fetch_id_sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $fav_id = $row['id'];

            // Prepare and execute SQL query to delete the entry for the logged-in user using the retrieved id
            $delete_sql = "DELETE FROM favourites WHERE id = $fav_id";
            if ($conn->query($delete_sql) === TRUE) {
                echo "success";
            } else {
                echo "error: " . $conn->error;
            }
        } else {
            echo "No matching entry found in favourites table.";
        }

        $conn->close();
        exit();
    } else {
        echo "User not logged in";
        exit();
    }
}
?>
