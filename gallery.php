<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
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
                <a href="account.php">Account</a>
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
    <section class="fake-bod">
    <div class="gallery-container" id="galleryContainer">
        <div class="gallery">
            <img src="Media/Is (1).jpg" alt="Image 1">
            <img src="Media/Is (2).jpg" alt="Image 1">
            <img src="Media/Is (3).jpg" alt="Image 1">
            <img src="Media/Is (10).jpg" alt="Image 1">
            <img src="Media/Is (11).jpg" alt="Image 1">
            <img src="Media/Is (12).jpg" alt="Image 1">
            <img src="Media/Is (13).jpg" alt="Image 1">
            <img src="Media/Is (14).jpg" alt="Image 1">
            <img src="Media/Is (15).jpg" alt="Image 1">
            <img src="Media/Is (4).jpg" alt="Image 1">
            <img src="Media/Is (5).jpg" alt="Image 1">
            <img src="Media/Is (6).jpg" alt="Image 1">
            <img src="Media/Is (7).jpg" alt="Image 1">
            <img src="Media/Is (8).jpg" alt="Image 1">
            <img src="Media/Is (9).jpg" alt="Image 1">

        </div>
    </div>
    </section>
    <script src="first.js"></script>
    <script>
        const galleryContainer = document.getElementById('galleryContainer');

        galleryContainer.addEventListener('wheel', (event) => {
            event.preventDefault();
            galleryContainer.scrollLeft += event.deltaY;
        });
    </script>
</body>
</html>
