<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourites</title>
    <link rel="stylesheet" href="favourite.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<header>
    <nav>
        <div class="container1">
            <div class="logo">
                <a href="first.php"><img src="logo.png" alt="">BRAND</a>
            </div>
            <button type="button" id="toggleButton"><img class="hamburger-menu" src="Media/hamburg.png" alt=""></button>
        </div>
    </nav>

    <section class="cover">
        <div class="navbar">
            <img src="Media/cross.png" class="cross">
            <a href="first.php">Home</a>
            <a href="destinations.php">Destinations</a>
            <a href="gallery.php">Gallery</a>
            <a href="account.php">Account</a>
            <?php
            session_start();
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.html">Login</a>';
            }
            ?>
        </div>
    </section>
</header>
<section class="container">
    <div class="div0">
        <h1>F A V O U R I T E S</h1>
        <div class="div1">
            <?php
            // Check if the user is logged in
            if(isset($_SESSION['user_id'])) {
                require_once 'config.php';
                $user_id = $_SESSION['user_id'];
                // Establish connection to MySQL database
                $conn = getDBConnection();
                // Fetch destination information for the logged-in user
                $sql = "SELECT * FROM favourites WHERE user_id = $user_id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    // Loop through each row in the result set
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <section class="sec">
                            <div class="contain">
                                <p><strong></strong> <span id="destination-name"><?php echo $row['name']; ?></span></p>
                                <p><strong></strong> <span id="destination-location"><?php echo $row['location']; ?></span></p>
                            </div>
                            <section class="outside-heart">
                                <section class="inside-heart">
                                    <div class="contain">
                                        <p><strong></strong> <span id="destination-cost"><?php echo $row['cost']; ?></span></p>
                                    </div>
                                    <div class="contain">
                                        <input type="checkbox" id="heart-checkbox-<?php echo $row['dest_id']; ?>" class="heart-checkbox" data-favorite-id="<?php echo $row['id']; ?>">
                                        <label for="heart-checkbox-<?php echo $row['dest_id']; ?>" class="heart-label"></label>
                                    </div>
                                </section>
                            </section>
                        </section>
                        <?php
                    }
                } else {
                    echo "<p>No favourites found.</p>";
                }
                // Close the database connection
                mysqli_close($conn);
            } else {
                // Redirect to login page if user is not logged in
                header("Location: login.html");
                exit();
            }
            ?>
        </div>
    </div>
</section>

<script src="first.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(".heart-checkbox").change(function() {
        var destinationId = $(this).attr("id").split("-")[2]; // Extract destination ID from checkbox ID
        $.post("delete_favourite.php", { destination_id: destinationId }, function(data) {
            if (data === "success") {
                location.reload(); // Refresh the page after successful deletion
            } else {
                alert("Error deleting favourite."); // Display error message if deletion fails
            }
        });
    });
});
</script>
</body>
</html>
