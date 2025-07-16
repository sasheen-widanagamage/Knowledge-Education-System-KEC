<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="my.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php require 'config.php'; ?>
    
    <!-- Navigation -->
    <div class="wrapper">
        <nav>
            <img src="img/logo.jpg" alt="img">
            <div class="navigation">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Examinations</a></li>
                    <li><a href="index.php">Results</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="my .php">Sign Up</a></li>
                    <li><a href="login.php">Sign In</a></li>
                </ul>
            </div>
        </nav>

        <form method="POST" action="signup.php">
            <div class="form-box">
                <div class="register-container" id="register">
                    <header>Sign Up</header>
                    <div class="two-forms">
                        <div class="input-box">
                            <input name="Fname" type="text" class="input-field" placeholder="Full Name">
                            <i class="bx bx-user"></i>
                        </div>
                    </div>

                    <div class="input-box">
                        <input name="mail" type="text" class="input-field" placeholder="Email">
                        <i class="bx bx-envelope"></i>
                    </div>

                    <div class="input-box">
                        <input name="pass" type="password" class="input-field" placeholder="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>

                    <div class="input-box">
                        <input type="submit" class="submit" value="Register" onclick="showPopup()">
                    </div>

                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Terms & Conditions</a></label>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="my.js"></script>
</body>
</html>