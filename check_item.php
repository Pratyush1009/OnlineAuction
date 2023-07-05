<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Item</title>
</head>
<body>
    <?php
        if(!empty($_POST["item_name"]) && !empty($_POST["item_description"]) && !empty($_POST["asking"]) && !empty($_FILES["item_pic"]["name"]))
        {
            require "connection.php";

            $iname=$_POST["item_name"];
            $idesc=$_POST["item_description"];
            $iasking=$_POST["asking"];
            $ipic=$_FILES["item_pic"]["name"];
            // $starttime=$_POST["starttime"];
            // $endtime=$_POST["endtime"];

            $sql="SELECT * FROM item WHERE item_name=?";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param("s", $iname);
            $stmt->execute();

            $result=$stmt->get_result();
            if($result->num_rows>=1)
            {
                $value="duplicate";
                $conn->close();
                header("Location:add_item.php?item=$value");
            }

            else
            {
                $sql="INSERT INTO item(item_name, item_desc, init_bid, item_pic, current_bid) VALUES (?, ?, ?, ?, ?)";
                $stmt=$conn->prepare($sql);
                $stmt->bind_param("sssss", $iname, $idesc, $iasking, $ipic, $iasking);
                $stmt->execute();

                $value="successful";
                $conn->close();
                header("Location:add_item.php?item=$value");
            }
        }
        else
        {
            header("Location:add_item.php");
        }
    ?>
</body>
</html>