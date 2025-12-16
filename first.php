<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aether-Elegance</title>
    <link rel="stylesheet" href="css/first.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
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
                <!-- <button type="button" id="crossButton"><img class="cross" src="Media/cross.png" alt=""></button> -->
                <!-- <input type="text" name="Search" id="" placeholder=""> -->
                <a href="account.php">Account</a>
                <a href="destinations.php">Destinations</a>
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

        <div class="center">
            IMMERSE YOURSELF
        </div>
        
        <img src="Media/SkyMountain.png" class="sky translate" data-speed=1>
        <img src="Media/FrontMountain.png" class="mountain1 translate" data-speed=-0.003 srcset="">
        <img src="Media/MidMountain.png" class="mountain2 translate" data-speed=0.5 srcset="">    
        <div class="shadow"></div>
    </header>

    
    <!-- <div class="shad"></div> -->
    <section>
    <div class="sec1" data-speed="-0.8">
        <div class="inside">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Numquam sed provident in quam officiis illum, adipisci unde 
            non assumenda optio ex! Dolor laboriosam quisquam debitis 
            deserunt veritatis temporibus repellat esse? Lorem ipsum dolor 
            sit, amet consectetur adipisicing elit. Accusantium voluptatem 
            repellat autem ut aliquid qui veritatis obcaecati suscipit 
            temporibus eos quia facere dolorum, voluptatum voluptas 
            mollitia blanditiis doloremque unde beatae?
        </div>
        <div class="right">   
            <h1 class="diving">DIVING</h1> 
            <a href="gallery.php"><img src="Media/P5.jpg" alt="" srcset=""></a>
        </div>
    </div>

    <div class="sec2 trans" data-speed="-0.8">
        <div class="inside">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Numquam sed provident in quam officiis illum, adipisci unde 
            non assumenda optio ex! Dolor laboriosam quisquam debitis 
            deserunt veritatis temporibus repellat esse? Lorem ipsum dolor 
            sit, amet consectetur adipisicing elit. Accusantium voluptatem 
            repellat autem ut aliquid qui veritatis obcaecati suscipit 
            temporibus eos quia facere dolorum, voluptatum voluptas 
            mollitia blanditiis doloremque unde beatae?
        </div>
        <div class="right">   
            <h1 class="section snorkeling">SNORKELING</h1> 
            <a href="gallery.php"><img src="Media/P6.jpg" alt="" srcset=""></a>
        </div>
    </div>
</section>

<section class="explore">
    <div class="div1">
        <div class="hidden">
            <div>
                <!-- Bookmark -->
            </div>
        </div>    
    <a href="destinations.php"><img src="Media/P10.jpg" alt="" srcset=""></a>
    
</div>

    <div class="div2">
        <!-- <p></p> -->
    <a href="destinations.php"><img src="Media/P7.jpg" alt=""></a>
    <!-- <p></p> -->
    <a href="destinations.php"><img src="Media/P9.jpg" alt="" srcset=""></a>
</div>
<div class="div4">
      E<br>  X<br>  P<br>  L<br>  O<br>  R<br>  E
</div>
<div class="div3">
    <a href="destinations.php"><img src="Media/P81.jpg" alt="" srcset=""></a>
    <div class="div30">
    <!-- <img src="Media/P11.jpg" alt="" srcset="">
    <img src="Media/P12.jpg" alt="" srcset=""> -->
</div>
</div>
</section>

<script src="js/first.js"></script>
</body>
</html>
