<?php
session_start();

include "database.php";

if(isset($_GET['ID']) && !empty($_GET['ID'])) {
    $bookID = $_GET['ID'];

    // SQL to delete a record
    $sql = "DELETE FROM `contact` WHERE ID = $bookID";

    if(mysqli_query($conn, $sql)) {
        // Redirect back to the order details page after deletion
        header("Location: admindash.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid order ID.";
}
?>
