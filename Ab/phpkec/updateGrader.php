<?php

require 'configkec.php';

// Get updated grader data to the form

$gID = $_POST["gId"];
$gName = $_POST["gName"];
$gContact = $_POST["gContact"];
$gSubject = $_POST["gSubject"];
$gEmail = $_POST["gEmail"];

// Check all fields are filled or not

if (empty($gID) || empty($gName) || empty($gContact) || empty($gEmail) || empty($gSubject)) 
{
    echo "All fields are required!";

} 
else 
{
    // SQL query to update grader details

    $sql = "UPDATE grader 
            SET gName = '$gName', gEmail = '$gEmail', gContactNo = '$gContact' , gSubject = '$gSubject'
            WHERE gId = '$gID'";

    // Check grader details updated or not

    if ($con->query($sql)) 
    {
        echo "Grader details updated successfully";
        header("Location: admin.php");  // Redirect to admin page 
    } 
    else 
    {
        echo "Error updating record: " . $con->error;
    }
}

$con->close();
?>