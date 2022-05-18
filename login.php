<?php
    $mail=$_POST['mail'];
    $password=$_POST['password'];


    $conn = new mysqli('localhost','root','','forms');
    if($conn->connect_error)
    {
        die("Connection Failed : ".$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("select * from register where mail=? and password=?");
        $stmt->bind_param("ss",$mail,$password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0){
            echo "<h2>Login Successful........</h2>";
        }
        else{
            echo "<h3>Invalid Email or Password</h3>";
        }

    }