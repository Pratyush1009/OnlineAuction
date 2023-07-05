<?php
    if(!empty($_POST["user"]) && !empty($_POST["pass"]))
    {
        require "connection.php";

        $username=$_POST["user"];

        $sql="SELECT * FROM login_register WHERE username=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $hash = $row["password"];

        if($_POST["pass"] == $hash)
        {   
            echo "Logged In Successfully!";
            session_start();
            $_SESSION["username"]=$_POST["user"];
            header("refresh:3;url=hme.php");
        }
        else
        {
            echo "Wrong Password or Username! Enter Correct Details";
            header("refresh:4;url=index.php");
        }
    }
    else
    {
        echo "Login Failed";
        echo "<br>";
        header("refresh:4;url=index.php");
    }
?>