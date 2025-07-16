<?php 

require 'config.php';

$fn = $_POST["Fname"];

$mai =$_POST["mail"];
$pas = $_POST["pass"];


$sql = "INSERT INTO mysignup VALUES ('$fn' , '$mai' , '$pas')";


if($con -> query($sql))
{
    header("Location: userprofile1.php");
}else{
    echo "Fail".$con -> error;
}




?>