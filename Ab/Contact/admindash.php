<?php 
    session_start();
    include "database.php"; // Ensure the database connection file path is correct
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/admindash.css">

    <title>Admin Dashboard</title>
</head>
<body>

    <div class="dashboard">
        <!-- Main content -->
        <div class="main-content">
            <header>
                <h1>Dashboard Overview</h1>
                <button class="btn-add"><a href="contactus.php">Add New</a></button>
            </header>

            <section class="table-container">
                <h2>Contact List</h2>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        // Fetch data from 'book' table and display in the table rows
                        $query = "SELECT * FROM `contact`";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['message'] ?></td>
                            <td>
                                <a href="edit.php?ID=<?php echo $row['ID']; ?>"><button class="btn">Edit</button></a>
                                <a href="delete.php?ID=<?php echo $row['ID']; ?>"><button class="btn">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </section>
        function goToBook() {
            window.location.href = 'contactus.php'; // Redirect to add book page
        }
    </script>
    
</body>
</html>
