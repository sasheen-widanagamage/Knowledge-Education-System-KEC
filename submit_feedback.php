<?php
// Include the database connection
include 'dbcon.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'], $_POST['feedback_text'])) {
    $studentId = intval($_POST['student_id']);
    $feedbackText = mysqli_real_escape_string($con, $_POST['feedback_text']);

    // SQL query to insert feedback into the database
    $sql = "INSERT INTO feedback (student_id, feedback_text, date) VALUES ('$studentId', '$feedbackText', NOW())";
    
    if (mysqli_query($con, $sql)) {
        // Feedback submitted successfully
        // Redirect to the results page (or wherever you want)
        header("Location: index.php"); // Change to the correct page if necessary
        exit();
    } else {
        // Error handling
        echo "Error: " . mysqli_error($con);
    }
} else {
    // If the request is not POST or required fields are missing
    echo "Invalid request.";
}
?>

