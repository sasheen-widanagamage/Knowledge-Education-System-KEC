|<?php 

$uname = $_POST['Fname'];
$umail =  $_POST['mail'];

$sql = "SELECT  Fname , Email FROM mysignup";

$result = $con -> query($sql);

if($result -> num_rowas > 0)
{
    while($row = $result -> fetch_assoc())
    {
            echo "<label style = 'font-size : 15px font-family : Arial'>First name :</label>"$row["Fname"]."<br>";
            echo "<labelstyle = 'font-size : 15px font-family : Arial'>Email :</label>"$row["Email"]."<br>";
               
    }
}


?>