<?php

require 'configkec.php';

// Get updated student data to the form

$stdID = $_POST["sId"];
$stdName = $_POST["sName"];
$stdContact = $_POST["sContact"];
$stdEmail = $_POST["sEmail"];

// Check all fields are filled or not

if (empty($stdID) || empty($stdName) || empty($stdContact) || empty($stdEmail)) 
{
    echo "All fields are required!";

} 
else 
{
    // SQL query to update student details

    $sql = "UPDATE student 
            SET sName = '$stdName', sEmail = '$stdEmail', sContactNo = '$stdContact' 
            WHERE sId = '$stdID'";

    // Check student details updated or not

    if ($con->query($sql)) 
    {
        echo "Student details updated successfully";
        header("Location: admin.php");  // Redirect to admin page 
    } 
    else 
    {
        echo "Error updating record: " . $con->error;
    }
}

$con->close();
?>
