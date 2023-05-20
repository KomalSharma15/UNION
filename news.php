<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- custom css link -->
    <link rel="stylesheet" href="css/style.css">

    <title>UNION</title>
</head>
<body>
    
    <!-- header section starts -->

    <header class="header">
        
        <a href="welcome.php" class="logo">UNION </a>

        <nav class="navbar">
            <a href="welcome.php" class="hover-underline">Home</a>
            <a href="about.php" class="hover-underline">About</a>

            <?php if (isset($_SESSION['username'])) { ?>
                <a href="membership.php" class="hover-underline">Membership</a>
                <a href="alumni.php" class="hover-underline">Alumni</a>
                <a href="news.php" class="hover-underline">News</a>
                <a href="contact.php" class="hover-underline">Contact</a>
            <?php } ?>

            <?php if (isset($_SESSION['username'])) { ?>
                <a href="logout.php" class="hover-underline">Logout</a>
                <a class="nav-link" href="#"><?php echo "Welcome ". $_SESSION['username']?></a>
            <?php } else { ?>
                <a href="register.php" class="hover-underline">Register</a>
                <a href="login.php" class="hover-underline">Login</a>
            <?php } ?>
        </nav>

    </header>

    <!-- header section ends -->
    
    <!-- news section starts -->

    <section class="news" id="news">

    <h1 class="heading">news/updates</h1>

    <div class="box-container">

        <div class="box">
            <div class="image shine">
                <img src="images/news-1.jpg" alt="">
                <h3>11 april 2023</h3>
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"><i class="fas fa-user"></i>By Admin</a>
                </div>
                <h3>Hiring Graduate Intern at Intel</h3>
                <p>Batch: 2023/2024 passouts <br> Last date to apply: April 15, 2023 </p>
                <a href="#" class="btn">
                    <span class="text text-1">Apply</span>
                    <span class="text text-2" aria-hidden="true">Apply</span>
                </a>
            </div>
        </div>

        <div class="box">
            <div class="image shine">
                <img src="images/news-2.jpg" alt="">
                <h3>09 april 2023</h3>
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"><i class="fas fa-user"></i>By Admin</a>
                </div>
                <h3>Hiring Data Analyst at Media.net</h3>
                <p>Batch: 2022/2023 passouts <br> Last date to apply: April 20, 2023</p>
                <a href="#" class="btn">
                    <span class="text text-1">Apply</span>
                    <span class="text text-2" aria-hidden="true">Apply</span>
                </a>
            </div>
        </div>

        <div class="box">
            <div class="image shine">
                <img src="images/news-3.jpg" alt="">
                <h3>05 april 2023</h3>
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"><i class="fas fa-user"></i>By Admin</a>
                </div>
                <h3>Summer Internship at IIT Hamirpur</h3>
                <p>Batch: 2024/2025 passouts <br> Last date to apply: April 17, 2023</p>
                <a href="#" class="btn">
                    <span class="text text-1">Apply</span>
                    <span class="text text-2" aria-hidden="true">Apply</span>
                </a>
            </div>
        </div>

    </div>

    </section>

    <!-- news section ends -->

    <!-- footer section stars -->

    <section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Find Us Here</h3>
            <p>Department of Mathematics (Gate No. 7), Jamia Millia Islamia, New Delhi-110025</p>
            <div class="share">
                <a href="https://www.facebook.com/srkmaths.jmi/" class="fab fa-facebook-f"></a>
            </div>
        </div>

        <div class="box">
            <h3>Contact Us</h3>
            <p>+011-26984343</p>
            <a href="mailto:mathematics@jmi.ac.in" class="link">mathematics@jmi.ac.in</a>
        </div>

    </div>
    <div class="credit">Created By <span> Students @2023 </span>| All Rights Are Reserved!</div>
    </section>

    <!-- footer section ends -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- custom js -->
<script src="js/script.js"></script>
</body>
</html>