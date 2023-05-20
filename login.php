<?php
// This script will handle login
session_start();

// Check if admin is already logged in
if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 1 && isset($_SESSION['admin_in'])) {
    // Admin is already logged in, redirect to admin dashboard
    header('location: admin.php');
    exit();
}

require_once "config.php"; // DB connection

$username = $password = "";
$err = "";

// If request method is POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username / password";
    } else {
        // Set username and password
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    // No error
    if (empty($err)) {
        $sql = "SELECT id, username, password, usertype FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $user_type);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // The password is correct. Allow user to login
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        if (!empty($user_type) && $user_type == 1) {
                            // Redirect admin to admin panel
                            $_SESSION["admin_in"] = true;
                            header("location: admin.php");
                        } else {
                            // Redirect user to user dashboard
                            $_SESSION["user_in"] = true;
                            header("location: welcome.php");
                        }
                        exit();
                    }
                }
            } else {
                $err = "Invalid username or password.";
            }
        } else {
            $err = "Oops! Something went wrong. Please try again later.";
        }
    } else {
        echo "<p class='error-msg'>$err</p>";
    }
}
?>

<!-- PHP code end -->

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

    <header class="header">
      <a href="index.php" class="logo">UNION </a>
      <nav class="navbar">
            <a href="index.php" class="hover-underline">Home</a>
            <a href="about.php" class="hover-underline">About</a>

            <?php if (isset($_SESSION['user_in'])): ?>
                <a href="membership.php" class="hover-underline">Membership</a>
                <a href="alumni.php" class="hover-underline">Alumni</a>
                <a href="news.php" class="hover-underline">News</a>
                <a href="contact.php" class="hover-underline">Contact</a>
            <?php elseif (isset($_SESSION['admin_in'])): ?>
                <a href="admin.php" class="hover-underline">Admin Panel</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['username'])) { ?>
                <a href="logout.php" class="hover-underline">Logout</a>
                <a class="nav-link" href="#"><?php echo "Welcome ". $_SESSION['username']?></a>
            <?php } else { ?>
                <a href="register.php" class=hover-underline">Register</a>
                <a href="login.php" class="hover-underline">Login</a>
            <?php } ?>
       </nav>
    </header>
<!-- rest of the code --> 
<!-- login form starts -->

    <section class="login-form">
        <h1 class="heading">Login</h1>
        <div class="container">
        <form class="login-form" action="" method="post">
            <input type="email" class="box" name="username" id="inputEmail4" placeholder="Enter Your Email">
            <input type="password" class="box" name ="password" id="inputPassword4" placeholder="Enter Your Password">
            <select required class="box" name ="usertype" >
                    <option disabled selected>Login As</option>
                    <option value=0>User</option>
                    <option value=1>Admin</option>
            </select>
            <button type="submit" class="btn">
                <span class="text text-1">Sign In</span>
                <span class="text text-2" aria-hidden="true">Sign In</span>
            </button>
        </form>
        </div>
    </section>
    <br>
    <!-- login form ends -->

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
