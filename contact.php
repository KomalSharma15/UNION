<?php
session_start();
require_once "config.php"; //db connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }

    if (empty($_POST['username'])) {
        $errors[] = 'Username is required';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
    }

    if (empty($_POST['phone'])) {
        $errors[] = 'Phone number is required';
    } else {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }

    if (empty($_POST['message'])) {
        $errors[] = 'Message is required';
    } else {
        $message = mysqli_real_escape_string($conn, $_POST['message']);
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO `contactus` (`name`, `username`, `phone`, `message`) VALUES ('$name', '$username', '$phone', '$message')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your entry has been submitted successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>';
        }
    } else {
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '.$error.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>';
        }
    }
}
?>

<!-- PHP code ends -->

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

    <!-- contact section starts -->

    <section class="contact" id="contact">

        <h1 class="heading">Contact Us</h1>

        <div class="row">
            <div class="image">
                <img src="images/contact.png" alt="">
            </div>
            <form action="" method="post">
                <h3>Send Us A Message</h3>
                <input type="text" name="name" placeholder="Name" class="box">
                <input type="email" name="username" placeholder="Email" class="box">
                <input type="number" name="phone" placeholder="Phone Number" class="box">
                <textarea name="message" placeholder="Message" class="box" cols="30" rows="10"></textarea>
                <button type="submit" class="btn">
                    <span class="text text-1">send message</span>
                    <span class="text text-2" aria-hidden="true">send message</span>
                </button>
            </form>
        </div>

    </section>

    <!-- contact section ends -->

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