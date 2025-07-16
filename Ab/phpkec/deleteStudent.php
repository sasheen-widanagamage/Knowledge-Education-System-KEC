<?php

require 'configkec.php';


// Get student ID

$stdID = $_GET['sid'];


// Check student ID validation

if (!empty($stdID)) 
{
    //SQL query to delete student

    $sql = "DELETE FROM student WHERE sId = '$stdID'";

    // Check delete student success
    
    if ($con->query($sql)) 
    {
        echo "Student deleted successfully";
        header("Location: admin.php");  // Redirect to admin page 
    } 
    else 
    {
        echo "Error deleting student: " . $con->error;
    }
} 
else
{
    echo "Invalid student ID.";
}

$con->close();

?>
