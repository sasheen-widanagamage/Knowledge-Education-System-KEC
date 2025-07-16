<?php

require 'configkec.php';


// Get details

$gName = $_POST["gname"];
$gContact = $_POST["gcontact"];
$gEmail = $_POST["gemail"];
$gSubject = $_POST["gsubject"];
$gPassword = $_POST["gpassword"];


// SQL query to insert grader data to database

$sql = "INSERT INTO grader (gName, gEmail, gContactNo, gSubject, gPassword) VALUES ('$gName', '$gEmail', '$gContact', '$gSubject', '$gPassword')";


// check grader added or not

if ($con->query($sql)) 
{
    echo "Grader added successfully";
    header("Location: admin.php");  // Redirect to admin page
} 
else 
{
    echo "Error: " . $con->error;
}


$con->close();
?>