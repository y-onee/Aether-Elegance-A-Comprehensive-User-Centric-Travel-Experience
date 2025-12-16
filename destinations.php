<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <link rel="stylesheet" href="destinations.css">
</head>
<body>
<header>
        <nav>
            <div class="container1">
            <div class="logo">
                    <a href="first.php"><img src="logo.png" alt="">
                    BRAND
                </a>
                </div>
                
                <button type="button" id="toggleButton"><img class="hamburger-menu" src="Media/hamburg.png" alt=""></button>
                
            </div>
        </nav>

        <section class="cover">
            <div class="navbar">
                <img src="Media/cross.png" class="cross">
                <a href="first.php">Home</a>
                <a href="account.php">Account</a>
                <a href="gallery.php">Gallery</a>
                <a href="favourite.php">Favorites</a>
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
        <h1>D E S T I N A T I O N S</h1>
        <div class="div1">
            <?php
            require_once 'config.php';
                $conn = getDBConnection();
                // Fetch destination information
                $sql = "SELECT * FROM destinations"; // Change '1' to the actual user ID
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    // Loop through each row in the result set
                    while($row = mysqli_fetch_assoc($result)) {
            ?>
                <section class="sec">
                    <div class="contain">
                        <!-- <p><strong></strong> <span id="destination-id"><?php echo $row['id']; ?></span></p> -->
                        <p><strong></strong> <span id="destination-name"><?php echo $row['name']; ?></span></p>
                        <p><strong></strong> <span id="destination-location"><?php echo $row['location']; ?></span></p>
                    </div>
                <!-- <section class="outside-heart"> -->
                    
                    <section class="inside-heart">
                    <div class="contain">
                        <p><strong></strong> <span id="destination-cost"><?php echo $row['cost']; ?></span></p>
                    </div>
                    <div class="contain">
                    <input type="checkbox" id="heart-checkbox-<?php echo $row['id']; ?>" class="heart-checkbox">
                                <label for="heart-checkbox-<?php echo $row['id']; ?>" class="heart-label"></label>
                    </div>

                    
                    </section>
                    </section>
            <?php
                    }
                } else {
                    echo "<p>No destinations found.</p>";
                }
                mysqli_close($conn);
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
            $.post("add_hearted_destinations.php", { destination_id: destinationId }, function(data) {
                alert(data); // Show response message
            });
        });
    });
    $(document).ready(function() {
    $(".heart-checkbox").each(function() {
        var destinationId = $(this).attr("id").split("-")[2];
        isHearted(destinationId);
    });

    $(".heart-checkbox").change(function() {
        var destinationId = $(this).attr("id").split("-")[2];
        if ($(this).is(":checked")) {
            addHeartedDestination(destinationId);
        } 
    });

    function isHearted(destinationId) {
        $.post("check_hearted_destinations.php", { destination_id: destinationId }, function(data) {
            if (data === "true") {
                $("#heart-checkbox-" + destinationId).next(".heart-label").addClass("red-heart");
            }
        });
    }

    function addHeartedDestination(destinationId) {
        $.post("add_hearted_destinations.php", { destination_id: destinationId }, function(data) {
            if (data === "success") {
                $("#heart-checkbox-" + destinationId).next(".heart-label").addClass("red-heart");
            }
        });
    }

    
    
});

</script>
<script>
    $(document).ready(function() {
        $(".heart-checkbox").change(function() {
            var destinationId = $(this).attr("id").split("-")[2]; // Extract destination ID from checkbox ID
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['user_id'])): ?>
                $.post("add_hearted_destinations.php", { destination_id: destinationId }, function(data) {
                    alert(data); // Show response message
                });
            <?php else: ?>
                alert("Please log in to add favorites.");
                $(this).prop('checked', false); // Uncheck the checkbox since user is not logged in
            <?php endif; ?>
        });
    });
</script>

</body>
</html>
