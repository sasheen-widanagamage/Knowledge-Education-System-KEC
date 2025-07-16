<?php

$con = new mysqli("localhost", "root", "", "online_exam_db");


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
