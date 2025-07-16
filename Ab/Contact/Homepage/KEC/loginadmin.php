<!DOCTYPE html>
<html lang = "en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">

    <title>Knowledge Education Center</title>

    <link rel="stylesheet" href="loginadmin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>

<body>

    <!--Navigation-->

    <nav>

        <img src = "images/logo.jpg" alt  = "img">

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

    <br><br><br><br><br><br><br><br><br>


    <section>

     <!--form-->

        <div class="wrapper">

            <form method="post" action="" autocomplete="off">

                <h1>Administrator Login</h1>



                    <div class="input-box">

                        <input type="text" placeholder="Username" name="name" autocomplete="off" required>
                        <i class='bx bxs-user'></i>

                    </div>

                    <div class="input-box">

                        <input type="password" placeholder="Password" name="pwd" autocomplete="new-password" required>
                        <i class='bx bxs-lock-alt'></i>

                    </div>

                     <button type="submit" name="sign" class="btn">Login</button>

            </form>

        </div>


    <?php 

    include('configkec.php'); 

    // Check if the form is submitted

    if(isset($_POST['sign'])) 
    { 
        
        $username = mysqli_real_escape_string($con, $_POST['name']);
        $password = mysqli_real_escape_string($con, $_POST['pwd']);

        
        $sql = "SELECT * FROM admin_login WHERE user_name = '$username' AND password = '$password'";

        
        $result = mysqli_query($con, $sql);

        
        if(!$result) 
        {
            die("Query failed: " . mysqli_error($con));
        }

        
        if(mysqli_num_rows($result) == 1) 
        {
            session_start();
            $_SESSION['user_name'] = $username; 

            
            header("Location: admin.php");
            exit(); 
        } 
        else 
        {
            echo '<script>alert("Invalid username or password.");</script>';
        }
    }

    ?>

<br><br><br><br><br>

</section>

    <!--Footer--> 

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


</body>

</html>