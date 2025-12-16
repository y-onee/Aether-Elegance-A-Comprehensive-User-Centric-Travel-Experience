<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <link rel="stylesheet" href="update.css">
    <script>
        function togglePasswordFields() {
            var passwordFields = document.querySelectorAll('.password-fields');
            passwordFields.forEach(function(field) {
                field.classList.toggle('hidden');
            });
        }
    </script>
</head>
<body >
    
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
<section class="main">
    <section class="container">
        <div class="form">
            <?php
            
            if(isset($_SESSION['user_id'])) {
                require_once 'config.php';
                $user_id = $_SESSION['user_id'];
                // Establish connection to MySQL database
                $conn = getDBConnection();
                // Fetch user information for the logged-in user
                $sql = "SELECT * FROM users WHERE user_id = $user_id";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <form action="update_process.php" method="POST">
                        <label for="username">Username:</label><br>
                        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br>
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
                        <!-- <button type="button" id="toggler">Change Password</button><br><br> -->
                        <div class="hidden">
                            <label for="old_password">Old Password:</label><br>
                            <input type="password" id="old_password" name="old_password"><br>
                            <label for="new_password">New Password (leave blank to keep current):</label><br>
                            <input type="password" id="new_password" name="new_password"><br><br>
                        </div>
                        <input type="submit" value="Update" name="submit">
                    </form>
                    <?php
                } else {
                    echo "<p>User not found.</p>";
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
    </section>
    </section>
</body>

<script src="first.js"></script>
</html>
