<!-- php code starts -->
<?php
    session_start();
    require_once "config.php"; //db connection

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        if(isset($_POST['gender'])) {
            $gender = $_POST['gender'];
        }
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $linkedin_id = $_POST['linkedin_id'];
        $batch = $_POST['batch'];
        if(isset($_POST['course'])) {
            $course = $_POST['course'];
        }
        $enrollment_no = $_POST['enrollment_no'];
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $marksheet = $_FILES['marksheet']['name'];
        $marksheet_tmp = $_FILES['marksheet']['tmp_name'];
        $occupation = $_POST['occupation'];
        $organization = $_POST['organization'];
        $designation = $_POST['desgination'];
        $employment_id = $_POST['employment_id'];
        $country = $_POST['country'];
        $city = $_POST['city'];

        // Check if the required fields are not empty
        if ($name && $dob && $gender && $email && $phone && $linkedin_id && $batch && $course && $enrollment_no && $photo && $marksheet && $occupation && $organization && $designation && $employment_id && $country && $city) {
            // Upload the files
            $photo_path = 'uploads/' . $photo;
            $marksheet_path = 'uploads/' . $marksheet;
            move_uploaded_file($photo_tmp, $photo_path);
            move_uploaded_file($marksheet_tmp, $marksheet_path);

            // Insert the data into the database
            $sql = "INSERT INTO `membership` (`name`, `dob`, `gender`, `email`, `phone`, `linkedin_id`, `batch`, `course`, `enrollment_no` , `photo`, `marksheet`, `occupation`, `organization`, `designation`, `employment_id`, `country`, `city`) VALUES ('$name', '$dob', '$gender', '$email', '$phone', '$linkedin_id', '$batch', '$course', '$enrollment_no', '$photo_path', '$marksheet_path', '$occupation', '$organization', '$designation', '$employment_id', '$country', '$city')";
            mysqli_query($conn, $sql);

            // Show a success message
            $success_message = 'Thank you for submitting the membership form. Your membership application has been received and is being processed.';
        } 
        else {
            // Show error message if required fields are empty
            $error_message = 'Please fill all the required fields';
        }
    }
?>

<!-- Display the error message if there is any error -->
<?php if (isset($error_message)) { ?>
<div class="error-message"><?php echo $error_message ?></div>
<?php } ?>
<!-- Display the success message if form is submitted successfully -->
<?php if (isset($success_message)) { ?>
<div class="success-message"><?php echo $success_message ?></div>
<?php } ?>

<!-- php code ends -->


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

    <!-- membership section starts -->

    <section class="membership" id="membership">

        <h1 class="heading">alumni membership</h1>
        <div class="row">
            <form class="membership" action=""  method="post" enctype="multipart/form-data">
                <h3>Membership Form</h3>
                <h2>Personal Details</h2>
                <input type="text" name="name" placeholder="Name" class="box">
                <input type="date" name="dob" placeholder="Date of Birth" class="box">
                <select required class="box" name="gender">
                    <option disabled selected>Select gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                </select>      
                <input type="email" name="email" placeholder="Email" class="box">
                <input type="number" name="phone" placeholder="Phone Number" class="box">
                <input type="text" name="linkedin_id" placeholder="Linkedin Id" class="box">

                <h2>University Details</h2>
                <input type="number" name="batch" placeholder="Batch (Year of Passing)" class="box">
                <select required class="box" name ="course" >
                    <option disabled selected>Course Attended</option>
                    <option>B.Sc.(Hons.) (Mathematics)</option>
                    <option>B.Sc.(Hons.) (Applied Mathematics)</option>
                    <option>M.A./M.Sc.(Mathematics) (Self-financed, Evening)</option>
                    <option>M.Sc.(Mathematics with Computer Science)</option>
                    <option>Ph.D.(Mathematics)</option>
                </select>
                <input type="text" name="enrollment_no" placeholder="Enrollment Number" class="box">
                <label>Upload your Recent Photograph</label><br>
                <input type="file" name="photo" placeholder="Upload your Recent Photograph" class="box">
                <label>Upload your Last Attended Degree</label><br>
                <input type="file" name="marksheet" placeholder="Upload your Last Attended Degree" class="box">

                <h2>Occupation Details</h2>
                <input type="text" name="occupation" placeholder="Occupation" class="box">
                <input type="text" name="organization"placeholder="Employment Firm/Organisation" class="box">
                <input type="text" name="desgination"placeholder="Designation" class="box">
                <input type="text" name="employment_id" placeholder="Employement ID Number" class="box">
                <input type="text" name="country"placeholder="Country of Present Residence" class="box">
                <input type="text" name="city"placeholder="City of Present Residence" class="box">

                <button type="submit" class="btn">
                    <span class="text text-1">register</span>
                    <span class="text text-2" aria-hidden="true">register</span>
                </button>
            </form>
        </div>

    </section>

    <!-- membership section ends -->

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