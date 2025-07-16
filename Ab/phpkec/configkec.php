<?php
 
// connect database

$con = new mysqli("localhost","root","","kec");

//check database connection connected succesfully or not 

if ($con->connect_error)
{
    die ("Connection faild".$con->connect_error);
}

?>