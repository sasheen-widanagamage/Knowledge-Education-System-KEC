<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='cuslogin.css' rel='stylesheet'>
</head>

<body>
    <header>
        <h2 class="logo">ParkEase</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <button class="btnlogin-popup">Login</button>
        </nav>
    </header>

    <!--form-->
    <div class="wrapper">
        <form method="post" action="">
            <h1>Login</h1>

            <div class="input-box">
                <input type="text" placeholder="Username" name="name" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="pwd" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me </label>
                <a href="foget.html">Forgot password?</a>
            </div>

            <button type="submit" name="sign" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account?
                    <a href="#">Register</a>
                </p>
            </div>
        </form>
    </div>

    <?php 

    include('database.php'); 

    // Check if the form is submitted
    if(isset($_POST['sign'])) { 
        
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['pwd']);

        
        $sql = "SELECT * FROM cus_officer WHERE user_name = '$username' AND password = '$password'";

        
        $result = mysqli_query($conn, $sql);

        
        if(!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        
        if(mysqli_num_rows($result) == 1) 
        {
            session_start();
            $_SESSION['user_name'] = $username; 

            
            header("Location: admindash.php");
            exit(); 
        } else {
            echo '<script>alert("Invalid username or password.");</script>';
        }
    }
    ?>
</body>
</html>