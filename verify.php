<?php
session_start();
require_once "config.php";

// Check if the form was submitted to verify a membership
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the member ID and membership code from the form submission
    $memberID = $_POST['id'];
    $verificationCode = $_POST['verification_code'];

    // Validate the membership code
    if (empty($verificationCode)) {
        $errorMsg = "Please enter a membership code.";
    } else {
        // Prepare and execute the SQL query to update the membership record
        $sql = "UPDATE membership SET verified = 1, verification_code = '$verificationCode' WHERE id = $memberID";
        if ($conn->query($sql) === TRUE) {
            $successMsg = "Membership verified successfully!";
        } else {
            $errorMsg = "Error updating membership: " . $conn->error;
        }
    }
}

// Prepare and execute the SQL query to retrieve unverified alumni
$sql = "SELECT * FROM membership WHERE verified = 0";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!-- Display a success or error message if there was a form submission -->
<?php
if (!empty($successMsg)) {
    echo "<p>$successMsg</p>";
} elseif (!empty($errorMsg)) {
    echo "<p>$errorMsg</p>";
}
?>

<!-- Rest of HTML code -->

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
<!-- table styling -->
<style>
    table, td, th {  
    border: 1.5px solid #141414;
    text-align: left;
    }

    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    padding: 15px;
    }
    tr:nth-child(even) {
    background-color: #dbfffe;
    }
</style>
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

    <!-- verification section starts -->

    <section class="verify" id="verify">
        <h1 class="heading">Membership Verification</h1>
        <!-- Display a table of unverified alumni with a button to verify each one -->
        <table style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>LinkedIn Id</th>
                    <th>Batch</th>
                    <th>Course</th>
                    <th>Enrollment No</th>
                    <th>Verify With Verification Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each row of the result
                while ($row = $result->fetch_assoc()) {
                    // Output the data for each row
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["linkedin_id"] . "</td>";
                    echo "<td>" . $row["batch"] . "</td>";
                    echo "<td>" . $row["course"] . "</td>";
                    echo "<td>" . $row["enrollment_no"] . "</td>";
                    echo "<td>";
                    // Display a form to assign membership code and verify the membership
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<input type='text' name='verification_code' id='verification_code' style='border: 1px solid #ccc;'>";
                    echo "<br>";
                    echo '<button type="submit" class="btn"><span class="text text-1">verify</span><span class="text text-2" aria-hidden="true">verify</span></button>';
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>    
    </section>
    <!-- verification section ends  -->
    
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