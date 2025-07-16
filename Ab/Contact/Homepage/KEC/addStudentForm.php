<?php

require 'configkec.php';
<link rel="stylesheet" href="form.css">



// Get details

$stdName = $_POST["sname"];
$stdContact = $_POST["scontact"];
$stdEmail = $_POST["semail"];
$stdPassword = $_POST["spassword"];


// SQL query to insert student data to database

$sql = "INSERT INTO student (sName, sEmail, sContactNo, sPassword) VALUES ('$stdName', '$stdEmail', '$stdContact', '$stdPassword')";


// check student added or not

if ($con->query($sql)) 
{
    echo "Student added successfully";
    header("Location: admin.php");  // Redirect to admin page
} 
else 
{
    echo "Error: " . $con->error;
}


$con->close();
?>