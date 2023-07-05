<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <style>
        body{
            background-color: #b3d9ff;
        }

        .cpass{
            margin-left: 600px;
            margin-top:100px;
        }

        .label{
            display: inline-block;
            width: 170px;
            font-weight: bold;
        }

        .text{
            margin-top:10px;
        }

        .submit{
            margin-top: 10px;
        }
    </style>

</head>
<body>
    <ul><a href="hme.php"><img src="shopping-venture-g9f039e948_640.png" height="100px" width="130px"></a></ul>

    <form class="cpass" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label class="label">Enter Username :</label>
        <input class="text" type="text" name="username" placeholder="Enter Username"><br>
        <label class="label">Enter Old Password :</label>
        <input class="password" type="text" name="oldpass" placeholder="Enter Old Password"><br>
        <label class="label">Enter New Password :</label>
        <input class="password" type="text" name="newpass" placeholder="Enter New Password"><br>

        <input class="submit" type="submit" value="Change Password">
    </form>

    <?php
        if(!empty($_POST['username']) && !empty($_POST['oldpass']) && !empty($_POST['newpass']))
        {
            $username=$_POST['username'];
            $oldpass=$_POST['oldpass'];
            $newpass=$_POST['newpass'];
            session_start();
            if($username == $_SESSION["username"]);
            {
                require "connection.php";
                $sql="SELECT username,password FROM login_register WHERE username='$username'";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    if($username==$row['username'] && $oldpass==$row['password'])
                    {
                        $sql="UPDATE `login_register` SET `password`='$newpass' WHERE username='$username'";
                        if(mysqli_query($conn,$sql))
                        {
                            echo "Password Changed Successfully";
                            header("refresh:3;url=hme.php");
                        }
                    }
                    else
                    {
                        echo "Incorrect Username, Enter Correct Username!";
                        header("refresh:2;url=changepassword.php");
                    }        
                }
            }
            $conn->close();
        }
    ?>
</body>
</html>