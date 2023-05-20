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

    <!-- alumni section starts -->

    <section class="alumni" id="alumni">

        <h1 class="heading">Eminent alumni</h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/alumni-1.png" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-google"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>ABC</h3>
                    <span>Assistant Professor</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/alumni-2.png" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-google"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>XYZ</h3>
                    <span>Software Engineer</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/alumni-3.png" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-google"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>PQR</h3>
                    <span>Branch Manager</span>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/alumni-4.png" alt="">
                    <div class="share">
                        <a href="#" class="fab fa-google"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
                <div class="content">
                    <h3>MNO</h3>
                    <span>Scientist Officer</span>
                </div>
            </div>

        </div>
        
    </section>

    <!-- alumni section ends -->

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