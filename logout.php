<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>

    <style>
        #logout{
            margin-top:300px;
            margin-left:600px;
            fon
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        $_SESSION = array();
        session_destroy();
        echo "<h1 id='logout'>Logged Out Successfully!</h1>";
        echo "<br>";
        header("refresh:3;url=index.php");
    }
    else
    {
        header("Location:index.php");
    }
?>
