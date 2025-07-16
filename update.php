<?php 

require 'config.php' ;

$mail = $_POST["email"];
$uname = $_POST["name"];

if(empty($mail) || empty($uname))
{
    echo "All require";
}else{

    $sql = "UPDATE mysignup SET Fname ='$uname'  WHERE Email = '$mail' ";
if($con -> query($sql))
{
   header("Location: userprofile1.php");
  
}else{
    echo "Failed".$con -> error;
}



}

$con -> close();

?>