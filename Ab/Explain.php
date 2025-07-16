<html>
<head>
    <title>Admin - Manage Students</title>  <!-- Page title -->
    <link rel="stylesheet" href="admin.css">  <!-- Link to the admin.css file for general styling -->
    <link rel="stylesheet" href="form.css">  <!-- Link to the form.css file for form-specific styling -->

    <script>
        // JavaScript function to edit student details
        function editStudent(id, name, email, contact) {
            document.getElementById("sId").value = id;  // Set the student ID in the form field
            document.getElementById("sname").value = name;  // Set the student name in the form field
            document.getElementById("semail").value = email;  // Set the student email in the form field
            document.getElementById("scontact").value = contact;  // Set the student contact in the form field
            document.getElementById("updateStudent").style.display = "block";  // Show the update student form
            document.getElementById("addStudentForm").style.display = "none";  // Hide the add student form
        }

        // JavaScript function to delete a student
        function deleteStudent(id) {
            if (confirm("Are you sure you want to delete this student?")) {  // Ask for confirmation before deleting
                window.location.href = `deleteStudent.php?sid=${id}`;  // Redirect to the deleteStudent.php file to handle deletion
            }
        }

        // JavaScript function to edit grader details
        function editGrader(id, name, email, contact, subject) {
            document.getElementById("gId").value = id;  // Set the grader ID in the form field
            document.getElementById("gname").value = name;  // Set the grader name in the form field
            document.getElementById("gemail").value = email;  // Set the grader email in the form field
            document.getElementById("gcontact").value = contact;  // Set the grader contact in the form field
            document.getElementById("gsubject").value = subject;  // Set the grader subject in the form field
            document.getElementById("updateGrader").style.display = "block";  // Show the update grader form
            document.getElementById("addGraderForm").style.display = "none";  // Hide the add grader form
        }

        // JavaScript function to delete a grader
        function deleteGrader(id) {
            if (confirm("Are you sure you want to delete this Grader?")) {  // Ask for confirmation before deleting
                window.location.href = `deleteGrader.php?gid=${id}`;  // Redirect to the deleteGrader.php file to handle deletion
            }
        }
    </script>
</head>

<body>

<!-- Admin Details Section -->
<div id="adminDetails">
    <img src="images/Johnny.jpg" alt="Admin Profile Photo" style="width:150px; border-radius:50%; margin-top:10px;">
    <!-- Admin's profile photo -->
    <h2>John Depp</h2>  <!-- Admin's name -->
    <p>Email: John22@gmail.com</p>  <!-- Admin's email -->
    <p>Age: 61 </p>  <!-- Admin's age -->
    <p>Contact: 0772367876</p>  <!-- Admin's contact number -->
</div>

<!-- Function to toggle visibility of admin details -->
<script>
    function showAdminDetails() {
        var details = document.getElementById("adminDetails");
        if (details.style.display === "none") {  // If admin details are hidden
            details.style.display = "block";  // Show them
        } else {
            details.style.display = "none";  // Otherwise, hide them
        }
    }
</script>

<div class="container">
    <!-- Student Management Section -->
    <div class="tittleaddstd">
        <h1 class="tittleaddstdh1">Student Management</h1>  <!-- Title for Student Management Section -->
        <button class="addstd" onclick="document.getElementById('addStudentForm').style.display = 'block'">ADD Student</button>
        <!-- Button to show the Add Student Form -->
    </div>

    <!-- Student List Display -->
    <div class="tableaddstd">
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP Code to fetch student data from the database and display it in the table -->
                <?php
                require 'configkec.php';  // Connect to the database
                $sql = "SELECT * FROM student";  // Query to select all students
                $result = $con->query($sql);  // Execute the query

                if ($result->num_rows > 0) {  // Check if any students were found
                    while ($row = $result->fetch_assoc()) {  // Loop through each student
                        // Display each student row in the table
                        echo "<tr>
                                <td>{$row['sId']}</td>
                                <td>{$row['sName']}</td>
                                <td>{$row['sEmail']}</td>
                                <td>{$row['sContactNo']}</td>
                                <td>
                                    <button class='edit-btn' onclick=\"editStudent('{$row['sId']}', '{$row['sName']}', '{$row['sEmail']}', '{$row['sContactNo']}')\">Edit</button>
                                    <button class='delete-btn' onclick=\"deleteStudent('{$row['sId']}')\">Delete</button>
                                </td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Student Form -->
    <div id="addStudentForm" style="display: none;">
        <fieldset>
            <legend><b>Add Student</b></legend>
            <form method="post" action="addStudentForm.php">  <!-- Form to submit new student data -->
                Name: <input type="text" name="sname" autocomplete="off" required><br>
                Contact: <input type="text" name="scontact" autocomplete="off" required><br>
                Email: <input type="email" name="semail" autocomplete="off" required><br>
                Password: <input type="password" name="spassword" autocomplete="new-password" required><br><br>
                <input type="submit" value="Add Student">  <!-- Button to submit the form -->
                <input type="reset" value="Reset">  <!-- Button to reset the form -->
            </form>
        </fieldset>
    </div>

    <!-- Update Student Form -->
    <div id="updateStudent" style="display: none;">
        <fieldset>
            <legend><b>Update Student</b></legend>
            <form method="post" action="updateStudent.php">  <!-- Form to update existing student data -->
                <input type="hidden" id="sId" name="sId">  <!-- Hidden field to store student ID -->
                Name: <input type="text" id="sname" name="sName" required><br>
                Contact: <input type="text" id="scontact" name="sContact" required><br>
                Email: <input type="email" id="semail" name="sEmail" required><br><br>
                <input type="submit" value="Update Student">  <!-- Button to submit the form -->
                <input type="reset" value="Reset">  <!-- Button to reset the form -->
            </form>
        </fieldset>
    </div>
</div>

<!-- Grader Management Section (Similar to Student Management Section) -->

<div class="container">
    <div class="tittleaddg">
        <h1 class="tittleaddgh1">Grader Management</h1>
        <button class="addg" onclick="document.getElementById('addGraderForm').style.display = 'block'">ADD Grader</button>
    </div>

    <div class="tableaddg">
        <table>
            <thead>
                <tr>
                    <th>Grader ID</th>
                    <th>Grader Name</th>
                    <th>Grader Email</th>
                    <th>Grader Contact Number</th>
                    <th>Grader Subject</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP Code to fetch grader data from the database and display it in the table -->
                <?php
                require 'configkec.php';  // Connect to the database
                $sql = "SELECT * FROM grader";  // Query to select all graders
                $result = $con->query($sql);  // Execute the query

                if ($result->num_rows > 0) {  // Check if any graders were found
                    while ($row = $result->fetch_assoc()) {  // Loop through each grader
                        // Display each grader row in the table
                        echo "<tr>
                                <td>{$row['gId']}</td>
                                <td>{$row['gName']}</td>
                                <td>{$row['gEmail']}</td>
                                <td>{$row['gContactNo']}</td>
                                <td>{$row['gSubject']}</td>
                                <td>
                                    <button class='edit-btn' onclick=\"editGrader('{$row['gId']}', '{$row['gName']}', '{$row['gEmail']}', '{$row['gContactNo']}', '{$row['gSubject']}')\">Edit</button>
                                    <button class='delete-btn' onclick=\"deleteGrader('{$row['gId']}')\">Delete</button>
                                </td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Grader Form -->
    <div id="addGraderForm" style="display: none;">
        <fieldset>
            <legend><b>Add Grader</b></legend>
            <form method="post" action="addGraderForm.php">  <!-- Form to submit new grader data -->
                Name: <input type="text" name="gname" autocomplete="off" required><br>
                Contact: <input type="text" name="gcontact" autocomplete="off" required><br>
                Email: <input type="email" name="gemail" autocomplete="off" required><br>
                Subject: <input type="text" name="gsubject" autocomplete="off" required><br>
                Password: <input type="password" name="gpassword" autocomplete="new-password" required><br><br>
                <input type="submit" value="Add Grader">  <!-- Button to submit the form -->
                <input type="reset" value="Reset">  <!-- Button to reset the form -->
            </form>
        </fieldset>
    </div>

    <!-- Update Grader Form -->
    <div id="updateGrader" style="display: none;">
        <fieldset>
            <legend><b>Update Grader</b></legend>
            <form method="post" action="updateGrader.php">  <!-- Form to update existing grader data -->
                <input type="hidden" id="gId" name="gId">  <!-- Hidden field to store grader ID -->
                Name: <input type="text" id="gname" name="gName" required><br>
                Contact: <input type="text" id="gcontact" name="gContact" required><br>
                Email: <input type="email" id="gemail" name="gEmail" required><br>
                Subject: <input type="text" id="gsubject" name="gSubject" required><br><br>
                <input type="submit" value="Update Grader">  <!-- Button to submit the form -->
                <input type="reset" value="Reset">  <!-- Button to reset the form -->
            </form>
        </fieldset>
    </div>
</div>

</body>
</html>









//Update grader

<?php

// Include the configuration file to connect to the database
require 'configkec.php';

// Retrieve the updated grader data from the form submission using the POST method
$gID = $_POST["gId"];
$gName = $_POST["gName"];
$gContact = $_POST["gContact"];
$gSubject = $_POST["gSubject"];
$gEmail = $_POST["gEmail"];

// Check if all fields are filled or not
if (empty($gID) || empty($gName) || empty($gContact) || empty($gEmail) || empty($gSubject)) 
{
    // If any field is empty, display an error message
    echo "All fields are required!";

} 
else 
{
    // SQL query to update the grader's details in the database
    // The query updates the grader's name, email, contact number, and subject where the grader's ID matches
    $sql = "UPDATE grader 
            SET gName = '$gName', gEmail = '$gEmail', gContactNo = '$gContact' , gSubject = '$gSubject'
            WHERE gId = '$gID'";

    // Check if the query was executed successfully
    if ($con->query($sql)) 
    {
        // If the update was successful, display a success message
        echo "Grader details updated successfully";
        
        // Redirect the user to the admin page after successful update
        header("Location: admin.php");  
    } 
    else 
    {
        // If there was an error updating the record, display the error message
        echo "Error updating record: " . $con->error;
    }
}

// Close the database connection
$con->close();
?>

//deletegrader
<?php

// Include the configuration file to establish the database connection
require 'configkec.php';

// Retrieve the grader ID from the URL using the GET method
// This assumes that the URL contains a query parameter 'gid' representing the grader ID
$gID = $_GET['gid'];

// Validate the grader ID to ensure it's not empty
if (!empty($gID)) 
{
    // If the grader ID is not empty, proceed to delete the grader

    // SQL query to delete the grader from the 'grader' table where the grader's ID matches the provided ID
    $sql = "DELETE FROM grader WHERE gId = '$gID'";

    // Execute the query and check if it was successful
    if ($con->query($sql)) 
    {
        // If the grader was successfully deleted, display a success message
        echo "Grader deleted successfully";
        
        // Redirect the user to the admin page after deletion is successful
        header("Location: admin.php");
    } 
    else 
    {
        // If there was an error deleting the grader, display an error message
        echo "Error deleting grader: " . $con->error;
    }
} 
else
{
    // If the grader ID is invalid (empty or missing), display an error message
    echo "Invalid grader ID.";
}

// Close the database connection after the operation is complete
$con->close();

?>
//add student form
<?php

// Include the configuration file to establish the database connection
require 'configkec.php';

// Link the CSS file to style the form (This line should be moved to the HTML part of the page, not PHP)
<link rel="stylesheet" href="form.css">

// Retrieve the student details from the submitted form using the POST method
$stdName = $_POST["sname"];       // Get the student's name
$stdContact = $_POST["scontact"]; // Get the student's contact number
$stdEmail = $_POST["semail"];     // Get the student's email address
$stdPassword = $_POST["spassword"]; // Get the student's password

// SQL query to insert the student's data into the 'student' table in the database
// This will insert the student's name, email, contact number, and password into the respective fields
$sql = "INSERT INTO student (sName, sEmail, sContactNo, sPassword) 
        VALUES ('$stdName', '$stdEmail', '$stdContact', '$stdPassword')";

// Check if the query was successfully executed (i.e., the student was added to the database)
if ($con->query($sql)) 
{
    // If the query is successful, display a success message
    echo "Student added successfully";
    
    // Redirect the user to the 'admin.php' page after the student is added
    header("Location: admin.php");
} 
else 
{
    // If there is an error during the query execution, display an error message with the error details
    echo "Error: " . $con->error;
}

// Close the database connection after the operation is complete to free up resources
$con->close();

?>

