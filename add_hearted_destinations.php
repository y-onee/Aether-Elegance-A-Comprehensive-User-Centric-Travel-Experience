<?php
require_once 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["destination_id"])) {
    // Handle adding hearted destination to the database
    $destination_id = $_POST["destination_id"];

    // Establish connection to MySQL database
    $conn = getDBConnectionObject();

    // Fetch destination information
    $fetch_sql = "SELECT * FROM destinations WHERE id = $destination_id";
    $fetch_result = $conn->query($fetch_sql);

    if ($fetch_result === FALSE) {
        echo "Error: " . $conn->error;
    } else {
        if ($fetch_result->num_rows > 0) {
            // Destination information fetched successfully
            $destination_data = $fetch_result->fetch_assoc();

            // Get the user ID from the session
            session_start();
            $user_id = $_SESSION['user_id'];

            // Check if the destination is already hearted by the user
            $check_sql = "SELECT * FROM favourites WHERE dest_id = $destination_id AND user_id = $user_id";
            $check_result = $conn->query($check_sql);

            if ($check_result === FALSE) {
                echo "Error: " . $conn->error;
            } else {
                if ($check_result->num_rows == 0) {
                    // Destination is not already hearted, so insert it into the favourites table
                    $insert_sql = "INSERT INTO favourites (dest_id, user_id, name, location, cost) VALUES ('$destination_id', '$user_id', '{$destination_data['name']}', '{$destination_data['location']}', '{$destination_data['cost']}')";
                    if ($conn->query($insert_sql) === TRUE) {
                        echo "Hearted destination added successfully!";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                } else {
                    echo "Destination is already hearted by the user.";
                }
            }
        } else {
            echo "Destination not found.";
        }
    }

    $conn->close();
    exit(); // Stop further execution of the script
}
?>
