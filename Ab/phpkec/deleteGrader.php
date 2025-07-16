<?php

require 'configkec.php';


// Get grader ID

$gID = $_GET['gid'];


// Check grader ID validation

if (!empty($gID)) 
{
    //SQL query to delete grader

    $sql = "DELETE FROM grader WHERE gId = '$gID'";

    // Check delete grader success
    
    if ($con->query($sql)) 
    {
        echo "Grader deleted successfully";
        header("Location: admin.php");  // Redirect to admin page 
    } 
    else 
    {
        echo "Error deleting grader: " . $con->error;
    }
} 
else
{
    echo "Invalid grader ID.";
}

$con->close();

?>