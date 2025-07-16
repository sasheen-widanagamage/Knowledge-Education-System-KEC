<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'grader_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create new grader profile
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO graders (first_name, last_name, age, email, phone) 
            VALUES ('$first_name', '$last_name', '$age', '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update grader profile
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE graders SET 
            first_name='$first_name', last_name='$last_name', age='$age', email='$email', phone='$phone' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // Redirect back to main page after update to reset the form to "create" mode
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete grader profile
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM graders WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        // Redirect after deletion to refresh the page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all grader profiles
$result = $conn->query("SELECT * FROM graders");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grader Profile</title>
    <link rel="stylesheet" href="graderprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
        <nav>
            <img src="images/logo.jpg" alt="Knowledge Education Center Logo">
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
    </header>

    <h2>Grader Profile List</h2>

    <!-- List of all graders -->
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- Form to add or edit grader -->
    <h3><?php echo isset($_GET['edit']) ? "Edit Grader" : "Add New Grader"; ?></h3>

    <?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $grader = $conn->query("SELECT * FROM graders WHERE id=$id")->fetch_assoc();
    ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $grader['id']; ?>">
            <label>First Name:</label>
            <input type="text" name="fname" value="<?php echo $grader['first_name']; ?>" required><br>

            <label>Last Name:</label>
            <input type="text" name="lname" value="<?php echo $grader['last_name']; ?>" required><br>

            <label>Age:</label>
            <input type="number" name="age" value="<?php echo $grader['age']; ?>" required><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $grader['email']; ?>" required><br>

            <label>Phone:</label>
            <input type="tel" name="phone" value="<?php echo $grader['phone']; ?>" required><br>

            <input type="submit" name="update" value="Update">
        </form>
    <?php } else { ?>
        <form action="" method="POST">
            <label>First Name:</label>
            <input type="text" name="fname" required><br>

            <label>Last Name:</label>
            <input type="text" name="lname" required><br>

            <label>Age:</label>
            <input type="number" name="age" required><br>

            <label>Email:</label>
            <input type="email" name="email" required><br>

            <label>Phone:</label>
            <input type="tel" name="phone" required><br>

            <input type="submit" name="create" value="Create">
        </form>
    <?php } ?>
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

<?php
$conn->close();
?>
