<?php
    require "connection.php";

    if(!isset($_POST['item_id'])){
        header("Location: display_items.php");
    }
    else
    {
        $item_id = $_POST['item_id'];
        session_start();
        $username=$_SESSION['username'];
        $sql = "SELECT * FROM bid WHERE item_id='$item_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($_SESSION['username'] == $row["username"])
        {
            echo "You are already the highest bidder";
            header("refresh:3;url=itemdisplay.php?item_id=$item_id");
        }
        else
        {
            $sql = "SELECT * FROM item WHERE item_id='$item_id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $bid = $_POST['bid'];

            if($bid > $row['current_bid']){
                $sql = "UPDATE item SET current_bid='$bid' WHERE item_id='$item_id'";
                mysqli_query($conn,$sql);
                
                $sql = "UPDATE item SET bid_num=bid_num+1 WHERE item_id='$item_id'";
                mysqli_query($conn,$sql);
                
                $sql = "INSERT INTO bid(username,item_id,bid_price) VALUES ('$username','$item_id','$bid')";
                mysqli_query($conn,$sql);

                $sql = "DELETE FROM bid WHERE bid_price<'$bid' AND item_id='$item_id'";
                mysqli_query($conn,$sql);

                echo "<h1>Congratulations!!! The current bid is Rs.'$bid'</h1>";
                header("refresh:3;url=itemdisplay.php?item_id=$item_id");
                $conn->close();
            }

            else
            {
                echo "<h1>Your bid must be greater than the current bid</h1>";
                header("refresh:3;url=itemdisplay.php?item_id=$item_id");
                $conn->close();
            }
        }
    }

?>
