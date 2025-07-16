<?php 

require 'config.php';

$delete = $_POST["del"];

$sql = "DELETE FROM mysignup WHERE Email = '$delete' ";


if($con -> query($sql))
{
   header("Location: userprofile1.php");
}else{

}

$con -> close();
?>