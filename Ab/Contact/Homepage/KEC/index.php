<?php
// Include database connection
include 'dbcon.php';

// Initialize variables
$studentInfo = [];
$results = [];
$error = "";
$semesterAnalysis = [];
$studentId = 0;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'])) {
    $studentId = intval($_POST['student_id']);

    // Get student information
    $studentSql = "SELECT * FROM students WHERE id = $studentId";
    $studentResult = mysqli_query($con, $studentSql);

    if (mysqli_num_rows($studentResult) > 0) {
        $studentInfo = mysqli_fetch_assoc($studentResult);

        // Get student results
        $resultSql = "SELECT * FROM student_results WHERE id = $studentId";
        $resultResult = mysqli_query($con, $resultSql);

        if (mysqli_num_rows($resultResult) > 0) {
            while ($row = mysqli_fetch_assoc($resultResult)) {
                $results[] = $row;
            }

            // Calculate Semester Analysis: GPA, Total Credits, General Marks
            $totalCredits = 0;
            $totalMarks = 0;
            $gpaSum = 0;
            $gradePoints = ['A+' => 4.0, 'A' => 4.0, 'A-' => 3.7, 'B+' => 3.3, 'B' => 3.0, 'C+' => 2.7, 'C' => 2.0, 'C-' => 1.7, 'D' => 1.0, 'F' => 0.0];

            foreach ($results as $result) {
                $totalMarks += intval($result['marks']);
                $totalCredits += 3; 
                if (isset($gradePoints[$result['grade']])) {
                    $gpaSum += $gradePoints[$result['grade']] * 3;
                }
            }

            $gpa = $totalCredits > 0 ? round($gpaSum / $totalCredits, 2) : 0;
            $semesterAnalysis = [
                'gpa' => $gpa,
                'total_credits' => $totalCredits,
                'total_marks' => $totalMarks
            ];
        } else {
            $error = "No results found for this student.";
        }
    } else {
        $error = "No student found with this ID.";
    }
}

// Handle feedback editing
if (isset($_POST['edit_feedback'])) {
    $feedbackId = intval($_POST['feedback_id']);
    $updatedFeedback = mysqli_real_escape_string($con, $_POST['feedback_text']);
    
    $editSql = "UPDATE feedback SET feedback_text = '$updatedFeedback' WHERE id = $feedbackId";
    mysqli_query($con, $editSql);
    header("Location: " . $_SERVER['PHP_SELF']); // Refresh the page after edit
    exit;
}

// Handle feedback deletion
if (isset($_POST['delete_feedback'])) {
    $feedbackId = intval($_POST['feedback_id']);
    
    $deleteSql = "DELETE FROM feedback WHERE id = $feedbackId";
    mysqli_query($con, $deleteSql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit ;// Refresh the page after delete
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Page</title>
    <link rel="stylesheet" href="result.css"> 
</head>
<body>

    <nav>
        <img src="images/logo.jpg" alt="logo">
        <div class="navigation">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="login.php">Examinations</a></li>
                <li><a href="index.php">Results</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="my .php">Sign Up</a></li>
                <li><a href="login.php">Sign In</a></li>
            </ul>
        </div>
    </nav>

    <br><br><br><br><br><br>

    <div class="container">
        <h1>Student Result</h1>

        <!-- Form  -->
        <form method="POST" action="">
            <label for="student_id">Enter Student ID:</label>
            <input type="number" id="student_id" name="student_id" required>
            <input type="submit" value="Submit">
        </form>

        <div class="content-container">
            <!-- Display Student Results -->
            <div class="student-results">
                <?php if (!empty($studentInfo)): ?>
                <div class="student-info">
                    <h3><b>Student Information</b></h3><br>
                    <p><strong>Name:</strong> <?php echo $studentInfo['name']; ?></p><br>
                    <p><strong>Registration ID:</strong> <?php echo $studentInfo['registration_id']; ?></p><br>
                    <p><strong>Faculty:</strong> <?php echo $studentInfo['faculty']; ?></p><br>
                    <p><strong>Study Year:</strong> <?php echo $studentInfo['study_year']; ?></p><br>
                </div>

                <h2>Course Results</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Grade</th>
                            <th>Marks</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result): ?>
                            <tr>
                                <td><?php echo $result['course_code']; ?></td>
                                <td><?php echo $result['course_name']; ?></td>
                                <td><?php echo $result['grade']; ?></td>
                                <td><?php echo $result['marks']; ?></td>
                                <td><?php echo $result['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php elseif ($error): ?>
                    <p><?php echo $error; ?></p>
                <?php endif; ?>
            </div>

            
            <?php if (!empty($semesterAnalysis)): ?>
            <div class="semester-analysis" style="float: right; width: 25%; background-color: #e3f2fd; padding: 10px;">
                <h3>Semester Analysis</h3>
                <p><strong>GPA:</strong> <?php echo $semesterAnalysis['gpa']; ?></p>
                <p><strong>Total Credits:</strong> <?php echo $semesterAnalysis['total_credits']; ?></p>
                <p><strong>Total Marks:</strong> <?php echo $semesterAnalysis['total_marks']; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Feedback -->
    <div class="feedback-section">
        <h2>Feedback Form</h2>
        <div class="feedback-form">
            <form method="POST" action="submit_feedback.php">
                <label for="feedback">Your Feedback:</label>
                <textarea id="feedback" name="feedback_text" required></textarea>
                <input type="hidden" name="student_id" value="<?php echo $studentId; ?>">
                <input type="submit" value="Submit Feedback">
            </form>
        </div>

        <!-- Display Feedback -->
<h3>Student Feedback</h3>
<div class="feedback-list">
    <ul>
        <?php
        $feedbackSql = "SELECT * FROM feedback WHERE student_id = $studentId";
        $feedbackResult = mysqli_query($con, $feedbackSql);

        if (mysqli_num_rows($feedbackResult) > 0) {
            while ($feedbackRow = mysqli_fetch_assoc($feedbackResult)) {
                ?>
                <li>
                    <span><?php echo $feedbackRow['feedback_text'] . " - " . $feedbackRow['date']; ?></span>
                    
                    <!-- Edit Button -->
                    <form method="POST" action="" style="display:inline;">
                        <textarea name="feedback_text" required><?php echo $feedbackRow['feedback_text']; ?></textarea>
                        <input type="hidden" name="feedback_id" value="<?php echo $feedbackRow['id']; ?>">
                        <input type="submit" name="edit_feedback" value="Edit">
                    </form>
                    
                    <!-- Delete Button -->
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="feedback_id" value="<?php echo $feedbackRow['id']; ?>">
                        <input type="submit" name="delete_feedback" value="Delete">
                    </form>
                </li>
                <?php
            }
        } else {
            echo "<p>No feedback available.</p>";
        }
        ?>
    </ul>
</div>


   
     <!-- Footer -->
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
