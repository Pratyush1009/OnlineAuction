<?php
if(!empty($_POST["fname"]) && !empty($_POST["phone"]) && !empty($_POST["user"]) && !empty($_POST["pass"]))
{
    require "connection.php";
    $name=$phone=$username=$password="";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST["fname"];
        $phone=$_POST["phone"];
        $username=$_POST["user"];
        $password=$_POST["pass"];
    }

    $sql="INSERT INTO login_register (name,username,password,mobile) VALUES ('$name','$username','$password','$phone')";
    if(mysqli_query($conn, $sql))
    {
        echo "<h1>Record added Successfully</h1>";
        session_start();
        $_SESSION["username"]=$_POST["user"];
        header("refresh:3;url=hme.php");
    }
    else
    {
        echo "<h1>Error Please Try Again</h1>";
        header("refresh:3;url=register.html");
    }
}    
?>