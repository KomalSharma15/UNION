<?php

session_start();

//if loggedin is either not set or not true
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

?>
<!-- PHP ends here -->

<!doctype html>
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
            <?php } else { ?>
                <a href="register.php" class="hover-underline">Register</a>
                <a href="login.php" class="hover-underline">Login</a>
            <?php } ?>
            <a class="nav-link" href="#"><?php echo "Welcome ". $_SESSION['username']?></a>
        </nav>
    </header>
  <!-- header section ends -->

  <!-- home section starts -->
    <section class="home" id="home">

        <div class="content">
            <h3>Department of Mathematics <br> Jamia Millia Islamia </h3>
            <p>Welcome to UNION! <br> Unite with Alumni and Grow your Network.</p>
            <a href="#about" class="btn">
                <span class="text text-1">Let's Connect</span>
                <span class="text text-2" aria-hidden="true">Let's Connect</span>
            </a>    
        </div>

    </section>
    <!-- home section ends -->

    <!-- about section starts -->

    <section class="about" id="about">

        <h1 class="heading">ABOUT US</h1>

        <div class="container">

            <figure class="about-image">
                <img src="images/logo.png" alt="" height="500">
            </figure>

            <div class="about-content">
                <p> Alumni are an institution’s brand ambassadors, carrying their core values of excellence, 
                    lifelong learning of inclusiveness and diversity all around the world.</p>

                <p> Union is an Alumni website of the Department of Mathematics, Jamia Millia Islamia which aims to manage 
                    alumni data of the department and to provide easy access for connectivity with other coursemates.</p>

                <p> Alumni can therefore, play a crucial role not only in spreading the name of Jamia Millia Islamia but also raise 
                    the quality of our Mathematics department that they hail from. Connection with alumni will help expand
                    business network and to gain insight into a new field.</p>    

                <a href="#aboutusmore" class="btn">
                    <span class="text text-1">know more</span>
                    <span class="text text-2" aria-hidden="true">know more</span>
                </a>        
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- what's in it for you section starts -->

    <section class="aboutusmore" id="aboutusmore">

        <h1 class="heading">What's in it for you?</h1>

        <div class="box-container">

            <div class="box">
                <img src="images/subject-1.png" alt="">
                <a href="membership.php"><h3>Membership</h3></a>
                <p>Have you been a student here? <br> Enroll as an Alumni</p>
            </div>

            <div class="box">
                <img src="images/subject-2.png" alt="">
                <a href="alumni.php"><h3>Alumni</h3></a>
                <p>Know more about the Eminent Alumni of our Department</p>
            </div>

            <div class="box">
                <img src="images/subject-3.png" alt="">
                <a href="news.php"><h3>News & Updates</h3></a>
                <p>New job oppurtunities coming on your way</p>
            </div>

            <div class="box">
                <img src="images/subject-4.png" alt="">
                <a href="contact.php"><h3>Queries</h3></a>
                <p>Answers to all your queries are just a click away</p>
            </div>

        </div>

    </section>

    <!-- what's in it for you section ends -->

    <!-- footer section starts -->

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
