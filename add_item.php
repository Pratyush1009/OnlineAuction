<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>

    <style>
        body{
            background-color: #b3d9ff;
        }

        .add_item{
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

        textarea{
            vertical-align:middle;
            resize:none;
        }
    </style>
</head>
<body>
    <ul><a href="hme.php"><img src="shopping-venture-g9f039e948_640.png" height="100px" width="130px"></a></ul>
    <?php
        echo "<br>";
        echo "<form class='add_item' class='label' action='check_item.php' method='POST' enctype='multipart/form-data'>";
        if(isset($_GET["item"]))
        {
            if($_GET["item"] == "duplicate")
            {
                echo "<h3>Item Already Exist</h3>";
                echo "<br>";
                echo "<h3>Please Try Again</h3>";
            }

            else if($_GET["item"]=="successful")
            {
                echo "<h3>Item Successfully Added</h3>";
                header("refresh:3;url=hme.php");
            }
        }

        else
        {
            echo "<h3>Add an Item</h3>";
        }

        echo "<label class='label' for='item_name'>Item Name:</label>";
        echo "<input class='text' type='text' name='item_name'/>";
        echo "<br>";

        // echo "<label class='label' for='item_description'>Item Description:</label>";
        // echo "<input class='text' type='text' name='item_description'/>";
        // echo "<br>";

        echo "<label class='label' for='item_description'>Item Description:</label>";
        echo "<textarea class='text'name='item_description' rows='6' cols='50'></textarea>";
        echo "<br>";

        echo "<label class='label' for='asking'>Minimum Bid Amount:</label>";
        echo "<input class='text' type='text' name='asking'/>";
        echo "<br>";

        // echo "<label class='label' for='endtime'>Starting Bid Time:</label>";
        // echo "<input class='text' type = 'datetime-local' name = 'starttime'/>";
        // echo "<br>";

        // echo "<label class='label' for='endtime'>Ending Bid Time:</label>";
        // echo "<input class='text' type = 'datetime-local' name = 'endtime'/>";
        // echo "<br>";

        echo "<label class='label' for='item_pic'>Item Picture:</label>";
        echo "<input class='text' type='file' value='item_pic' name='item_pic'/>";
        echo "<br>";

        echo "<input class='submit' type='submit' value='Add Item'/>";
        echo "</form>";
    ?>
</body>
</html>