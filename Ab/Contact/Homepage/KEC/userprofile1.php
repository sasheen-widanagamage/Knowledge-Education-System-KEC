<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">

    <title>User profile</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="userprofile2.css">

</head>
<body>

<?php 
require 'config.php'
?>
<!--UserDashboerd section start-->

<!--Navigation-->
<nav>
        <img src = "img/logo.jpg" alt  = "img">
        <div class = "navigation" >
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Examinations</a></li>
                <li><a href="index.php">Results</a></li>
                <li><a href="contactus.php">Contact US</a></li>
                <li><a href="my .php">Sign UP</a></li>
                <li><a href="login.php">Sign IN</a></li>
            </ul> 

        </div>
    </nav>




<section class="UserDashboard">

    <div class="container">
        <!-- Left Panel -->
        <div class="left-panel">
            <!-- Username Section -->
            <div class="user-section">
                <h2 class="username">USER NAME</h2>
                
            </div>

            <!-- Profile Picture -->
            <div class="profile-picture">
                <img src="img/user1.jpg" alt="Profile Picture" class="profile-pic">
            </div>

            <!-- Bio Section -->
            <h3>Bio</h3>
            <textarea rows="6" cols="30" placeholder="Enter your bio..."></textarea>

            
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <!-- Account Information (Display Only) -->
             <div class = "read-info">
            <?php 

            require'config.php';

                $sql = "SELECT  Fname , Email FROM mysignup";

                $result = $con -> query($sql);

                    if($result -> num_rows > 0)
                    {
                        while($row = $result -> fetch_assoc())
                        {
                                echo "First name : ".$row["Fname"]."<br><br>";
                                echo "Email : ".$row["Email"]."<br><br>";
                                
                        }
} else{
    echo "No users found.";
}

$con -> close();


?>
</div>

<div class = "update-info">
<form method ="POST"action="update.php">
<h3>Change Username</h3>
                <label for="new-username">Email :</label>
                <input type="text" name = "email" id="new-username">
                <label for="confirm-username">New Username</label>
                <input type="text" name = "name" id="confirm-username">   
                <input type="submit" class="uSubmit">
</form>
                <button> <a href="delu.php">Delete</a></button>
</div>
               
               

            </div>

           
           
        </div>
    </div>


    </section>
    

<!--UserDashboard section end-->




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
                    <li><a href="tearm.php">Terms And Conditions</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="privecy.html">Privacy And Policy</a></li>
                </ul>
            </div>

            <div class="footerBottom">

                <p>Copyright @KnowledgeEducationCenter &copy;2024</p>
            </div>
             

        </div>


    </footer>





<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>