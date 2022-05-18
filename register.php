<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mail = $_POST['mail'];
$password = $_POST['password'];
$dob = $_POST['dob'];



$conn = new mysqli('localhost','root','','forms');
if($conn->connect_error)
{
    die("Connection failed : ".$conn->connect_error);
}
else 
{
    $stmt = $conn->prepare("insert into register(fname,lname,mail,password,dob) values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$fname,$lname,$mail,$password,$dob);
    $stmt->execute();
    header("Location: redirect.html");
    $stmt->close();
    $conn->close();
}

?>