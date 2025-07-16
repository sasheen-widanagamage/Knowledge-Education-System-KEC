<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $Fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $Iname = mysqli_real_escape_string($conn, $_POST['lname']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
    $Mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $Message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($Fname) && !empty($Iname) && !empty($Email) && !empty($Mobile)) {
        $stmt = $conn->prepare("INSERT INTO `contact` (fname, lname, email, mobile, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $Fname, $Iname, $Email, $Mobile, $Message);

        if ($stmt->execute()) {
            echo "<script>alert('Successfully Created'); window.location.href = 'admindash.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please Enter some Valid Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Education Center</title>
    <link rel="stylesheet" href="styles/contactus.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-image: url('imgl/homebg.jpg');">

<!-- Navigation (Add your own navigation content here) -->
<nav>
        <img src = "imgl/logo.jpg" alt  = "img" class="logo">
        <div class = "navigation" >
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Examinations</a></li>
                <li><a href="#">Results</a></li>
                <li><a href="#">Contact US</a></li>
                <li><a href="#">Sign UP</a></li>
                <li><a href="#">Sign IN</a></li>
            </ul> 

        </div>
    </nav>

<div class="contact">
    <form method="post">
        <h1>Contact Us Form</h1>
        <input type="text" id="fname" name="fname" placeholder="First Name" required>&nbsp;
        <input type="text" id="lname" name="lname" placeholder="Last Name" required>&nbsp;
        <input type="email" id="email" name="email" placeholder="Email" required>&nbsp;
        <input type="text" id="mobile" name="mobile" placeholder="Mobile" required>&nbsp;
        <h4>Type your Message Here...</h4>
        <textarea name="message" required></textarea><br><br>
        <center>
            <input type="submit" value="Submit" name="submit" id="button">
        </center>
    </form>
</div>

<footer>

        <div class="footerContainer">

            <div class="socialIcons">

                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus"></i></a>
                

            </div>

            <div class="footerNav">

                <ul>
                    <li><a href="#">Terms And Conditions</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy And Policy</a></li>
                </ul>
            </div>

            <div class="footerBottom">

                <p>Copyright @KnowledgeEducationCenter &copy;2024</p>
            </div>
             

        </div>


    </footer>

</body>
</html>
