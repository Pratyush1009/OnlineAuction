<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <style> 
        body{
            background-color: #b3d9ff;
        }

        table,td
        { 
            border-collapse: collapse; 
            border-style: solid; 
            border-color: black; 
            width: 500px; 
            height:50px; margin-left: auto; 
            margin-right: auto; 
            margin-top: 75px; 
        } 
        #row1,#row2,#row3,#row4{ 
            font-size: 30px; 
            font-family: 'Times New Roman', Times, serif; 
            text-align: center; 
        } 

        #row4{
            border-top-style:hidden;
            border-left-style:hidden;
            border-right-style:hidden;
        }

        #login{
            text-align:center;
        }
    </style>

</head>
<body>
    <ul><a href="hme.php"><img src="shopping-venture-g9f039e948_640.png" height="100px" width="130px"></a></ul>
    <?php
        session_start();
        if(isset($_SESSION["username"]))
        {
            require "connection.php";
            $username=$_SESSION["username"];
            $sql="SELECT * FROM login_register WHERE username='$username'";

            $result=mysqli_query($conn,$sql);
            
            while($row=mysqli_fetch_assoc($result))
            {
                $name=$row["name"];
                $mobile=$row["mobile"];
            }

                echo "<table border='2' style='table-layout: fixed;'>";
                
                    echo "<tr id='row4'>";
                        echo "<td colspan='2'><img src='avatar.jpg' height='160px' width='160px'></td>";
                    echo "</tr>";
            

                    echo "<tr id='row1'>";
                        echo "<td>Name</td>";
                        echo "<td>$name</td>";
                    echo "</tr>";
                    
                    echo "<tr id='row2'>";
                        echo "<td>Username</td>";
                        echo "<td>$username</td>";
                    echo "</tr>";
                    
                    echo "<tr id='row3'>";
                        echo "<td>Mobile No.</td>";
                        echo "<td>$mobile</td>";
                    echo "</tr>";

                echo "</table>";
        }
        else
        {
            echo "<h2 id='login'>Login or Register First</h2>";
        }
    ?>

</body>
</html>

