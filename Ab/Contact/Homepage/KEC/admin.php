<html>
<head>

    <title>Admin - Manage Students</title>

    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="forms.css">

    
    <script>
        
        // function to edit student details
        

        function editStudent(id, name, email, contact)
        {

            document.getElementById("sId").value = id;
            document.getElementById("sname").value = name;
            document.getElementById("semail").value = email;
            document.getElementById("scontact").value = contact;
            document.getElementById("updateStudent").style.display = "block";
            document.getElementById("addStudentForm").style.display = "none";

        }
        

        // function to delete student

        function deleteStudent(id) 
        {
            if (confirm("Are you sure you want to delete this student?")) 
            {
                window.location.href = `deleteStudent.php?sid=${id}`;
            }
        }


        // function to edit grader details
        

        function editGrader(id, name, email, contact, subject)
        {

            document.getElementById("gId").value = id;
            document.getElementById("gname").value = name;
            document.getElementById("gemail").value = email;
            document.getElementById("gcontact").value = contact;
            document.getElementById("gsubject").value = subject;

            document.getElementById("updateGrader").style.display = "block";
            document.getElementById("addGraderForm").style.display = "none";

        }
        

        // function to delete grader

        function deleteGrader(id) 
        {
            if (confirm("Are you sure you want to delete this Grader?")) 
            {
                window.location.href = `deleteGrader.php?gid=${id}`;
            }
        }

    </script>


    <script type="text/javascript">

    // character validation
    function allowOnlyLetters(event) 
    {
        var charCode = event.charCode || event.keyCode; // Get the character code

        //  letter (A-Z or a-z) 
        if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 8 || charCode == 32) 
        { 
            return true;
        } 
        else 
        {
            return false; 
        }
    }


    function allowOnlyNumbers(evt) 
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
    
        // Allow numbers (0-9) and Backspace
        if ((charCode >= 48 && charCode <= 57) || charCode == 8 ) 
        { 
            return true;
        } 
        else 
        {
            return false; 
        }
}

    </script>

</head>

<body>


    <!-- Admin Profile Button -->

    <div class="admin-profile">

        <button onclick="showAdminDetails()">Profile</button>

    </div>


    <!-- Admin Details Section -->
    
    <div id="adminDetails" >

        <img src="images/Johnny.jpg" alt="Admin Profile Photo" style="width:150px; border-radius:50%; margin-top:10px;">
        <h2>John Depp</h2>
        <p>Email: John22@gmail.com</p>
        <p>Age: 61 </p>
        <p>Contact: 0772367876</p>

    </div>


    <!-- function to show admin details -->

    <script>

        function showAdminDetails() 
        {
            var details = document.getElementById("adminDetails");
            if (details.style.display === "none") 
            {
            details.style.display = "block";
            } 
            else 
            {
            details.style.display = "none";
            }
        }

    </script>


    <div class="container">

        <div class="tittleaddstd">

            <h1 class="tittleaddstdh1">Student Management</h1>

            <button class="addstd" onclick="document.getElementById('addStudentForm').style.display = 'block'">ADD Student</button>

        </div>


        <!--display student list-->

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

                    <?php

                    require 'configkec.php';
                    $sql = "SELECT * FROM student";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) 
                        {
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


        <!-- add student form -->

        <div id="addStudentForm" style="display: none;">

            <fieldset> 

                <legend><b>Add Student</b></legend>

                <form method="post" action="addStudentForm.php"> 

                    Name: <input type="text" name="sname" autocomplete="off" onkeypress="return allowOnlyLetters(event)" required><br>
                    Contact: <input type="text" name="scontact" autocomplete="off" onkeypress="return allowOnlyNumbers(event)"  required><br>
                    Email: <input type="email" name="semail" autocomplete="off" required><br>
                    Password: <input type="password" name="spassword" autocomplete="new-password" required><br><br>
                    <input type="submit" value="Add Student">  
                    <input type="reset" value="Reset">

                </form>

            </fieldset>

        </div>


        <!-- update student form -->

        <div id="updateStudent" style="display: none;">

            <fieldset> 

                <legend><b>Update Student</b></legend>

                <form method="post" action="updateStudent.php"> 

                    <input type="hidden" id="sId" name="sId">
                    Name: <input type="text" id="sname" name="sName" onkeypress="return allowOnlyLetters(event)" required><br>
                    Contact: <input type="text" id="scontact" name="sContact" onkeypress="return allowOnlyNumbers(event)" required><br>
                    Email: <input type="email" id="semail" name="sEmail" required><br><br>
                    <input type="submit" value="Update Student">  
                    <input type="reset" value="Reset">

                </form>

            </fieldset>

        </div>

    </div>

    <div class="container">


        <div class="tittleaddg">

            <h1 class="tittleaddgh1">Grader Management</h1>

            <button class="addg" onclick="document.getElementById('addGraderForm').style.display = 'block'">ADD Grader</button>

        </div>


<!--display grader list-->

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

                    <?php
                    
                    require 'configkec.php';

                    $sql = "SELECT * FROM grader";

                    $result = $con->query($sql);

                    if ($result->num_rows > 0) 
                    {
                        while ($row = $result->fetch_assoc()) 
                        {
                            echo "<tr>
                                    <td>{$row['gId']}</td>
                                    <td>{$row['gName']}</td>
                                    <td>{$row['gEmail']}</td>
                                    <td>{$row['gContactNo']}</td>
                                    <td>{$row['gSubject']}</td>

                                    <td>
                                        <button class='edit-btn' onclick=\"editGrader('{$row['gId']}', '{$row['gName']}', '{$row['gEmail']}', '{$row['gContactNo']}' , '{$row['gSubject']}')\">Edit</button>
                                        <button class='delete-btn' onclick=\"deleteGrader('{$row['gId']}')\">Delete</button>
                                    </td>
                                </tr>";
                        }
                    }

                    ?>

                </tbody>

            </table>

        </div>


    <!-- add grader form -->

        <div id="addGraderForm" style="display: none;">

            <fieldset> 

                <legend><b>Add Grader</b></legend>

                <form method="post" action="addGraderForm.php"> 

                    Name: <input type="text" name="gname" autocomplete="off" onkeypress="return allowOnlyLetters(event)" required><br>
                    Contact: <input type="text" name="gcontact" autocomplete="off" onkeypress="return allowOnlyNumbers(event)" required><br>
                    Email: <input type="email" name="gemail" autocomplete="off" required><br>
                    Subject:<input type="text" name="gsubject" autocomplete="off" required><br>
                    Password: <input type="password" name="gpassword" autocomplete="new-password" required><br><br>
                    <input type="submit" value="Add Grader">  
                    <input type="reset" value="Reset">

                </form>

            </fieldset>

        </div>


    <!-- update grader form -->

        <div id="updateGrader" style="display: none;">

            <fieldset> 

                <legend><b>Update Grader</b></legend>

                <form method="post" action="updateGrader.php"> 

                    <input type="hidden" id="gId" name="gId">
                    Name: <input type="text" id="gname" name="gName" onkeypress="return allowOnlyLetters(event)" required><br>
                    Contact: <input type="text" id="gcontact" name="gContact" onkeypress="return allowOnlyNumbers(event)" required><br>
                    Email: <input type="email" id="gemail" name="gEmail" required><br>
                    Subject: <input type="text" id="gsubject" name="gSubject" required><br><br>
                    <input type="submit" value="Update Grader">  
                    <input type="reset" value="Reset">

                </form>

            </fieldset>

        </div>

    </div>


</body>
</html>