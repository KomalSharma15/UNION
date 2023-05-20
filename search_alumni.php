<?php
session_start();
require_once "config.php";

// Check if the search query was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve search query from the form submission
    $searchQuery = $_POST['search'];

    // Validate the search query
    if (empty($searchQuery)) {
        $errorMsg = "Please enter a search query.";
    } else {
        // Prepare and execute the SQL query
        $sql = "SELECT * FROM membership WHERE name LIKE '%$searchQuery%'";
        $result = $conn->query($sql);

        // Check if any results were found
        if ($result->num_rows > 0) {
            // Loop through each row of the result
            while ($row = $result->fetch_assoc()) {
                // Output the data for each row
                echo "Name: " . $row["name"] . "<br>";
                echo "Email: " . $row["email"] . "<br>";
                echo "Graduation Year: " . $row["batch"] . "<br>";
                echo "<hr>"; // Add a horizontal line between alumni
            }
        } else {
            $errorMsg = "No results found.";
        }
    }
}

// Close the database connection
$conn->close();
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
        
        <a href="admin.php" class="logo">UNION </a>

        <nav class="navbar">
            <a href="admin.php" class="hover-underline">Home</a>
            <a href="about_admin.php" class="hover-underline">About</a>

			<?php if (isset($_SESSION['username'])) { ?>
                <a href="verify.php" class="hover-underline">Membership Verification</a>
                <a href="search_alumni.php" class="hover-underline">Search Alumni</a>
                <a href="#" class="hover-underline">Posts News</a>
                <a href="#" class="hover-underline">Resolve Queries</a>
            <?php } ?>

            <?php if (isset($_SESSION['username'])) { ?>
                <a href="logout.php" class="hover-underline">Logout</a>
            <?php } else { ?>
                <a href="register.php" class=hover-underline">Register</a>
                <a href="login.php" class="hover-underline">Login</a>
            <?php } ?>
			<a class="nav-link" href="#"><?php echo "Welcome Admin ". $_SESSION['username']?></a>
        </nav>

    </header>

    <!-- header section ends -->

    <!-- search section starts -->

    <section class="search" id="search">
        <h1 class="heading">Search Alumni</h1>
        <!-- HTML form to input the search query -->
        <form class="login-form" method="post">
            <label for="search"><strong><span style='font-size: larger;'>Enter Alumni Name</strong></span></label><br><br>
            <input type="text" name="search" id="search" class="box"><br>
            <button type="submit" class="btn">
                <span class="text text-1">Search</span>
                <span class="text text-2" aria-hidden="true">Search</span>
            </button>
        </form>

        <!-- Display an error message if there was a validation error or no results were found -->
        <?php
        if (!empty($errorMsg)) {
            echo "<p>$errorMsg</p>";
        }
        ?>
        <br><br><br><br>
    </section>

    <!-- search section ends -->

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
