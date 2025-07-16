<?php
session_start();
include("database.php");

if (isset($_POST['update'])) {
    $ID = $_POST['ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE `contact` SET fname = ?, lname = ?, mobile = ?, email = ?, message = ? WHERE ID = ?");
    $stmt->bind_param("sssssi", $fname, $lname, $mobile, $email, $message, $ID);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully!');</script>";
        header('Location: admindash.php');
        exit(); // Ensure the script stops execution after redirection
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $stmt = $conn->prepare("SELECT * FROM `contact` WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $fname = $row['fname'];
        $lname = $row['lname'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $message = $row['message'];
        $ID = $row['ID'];
    } else {
        echo "No record found.";
    }
    $stmt->close();
} else {
    echo "No ID parameter passed.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/edit.css">
    <title>Edit Form</title>
</head>
<body>
    <div class="contact">
        <form action="edit.php" method="post">
            <h1>Edit Form</h1>
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <input type="text" id="firstname" name="fname" placeholder="First Name" value="<?php echo $fname; ?>" required>&nbsp;
            <input type="text" id="lastname" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>" required>&nbsp;
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>&nbsp;
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" required>&nbsp;
            <h4>Type your Edit Message Here...</h4>
            <textarea name="message" required><?php echo $message; ?></textarea><br><br>
            <input type="submit" value="Update" name="update" id="button">
        </form>
    </div>
</body>
</html>
