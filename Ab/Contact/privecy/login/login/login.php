<?php
// Database connection
$servername = "localhost"; // Change as per your setup
$username = "root"; // Change as per your setup
$password = ""; // Change as per your setup
$dbname = "log"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// LOGIN handler
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists in the database
    $stmt = $conn->prepare("SELECT * FROM logusers WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>
<body>

    <!-- Header Section -->
    <header>
        <nav>
            <img src="images/logo.jpg" alt="Knowledge Education Center Logo">
            <div class="navigation">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Examinations</a></li>
                    <li><a href="#">Results</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Sign In</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main> 
    <!-- Login Form -->
    <div class="container">
        <div class="box form-box">
            <header>LOGIN</header>
            <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
            <form action="login.php" method="POST">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="LOGIN">
                </div>
                <div class="links">
                    Don't have an account? <a href="signup.html">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
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
        </main>

    </footer>

    <script src="js/myscript1.js"></script> <!-- Ensure the path to your JS file is correct -->

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
