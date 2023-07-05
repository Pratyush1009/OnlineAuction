<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Display</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        #bidform{
            display:none;
        }

        .login{
            text-align:center;
            margin-top:200px;
        }

        .card-wrapper{
            max-width: 1100px;
            margin:auto;
            top:50%;
            left:50%;
            position:absolute;
            transform:translate(-50%,-50%);
        }

        input[type='text']{
            border:2px solid black;
        }

        input[type='submit']{
            width:50px;
            cursor: pointer;
        }

        .product-content{
            display:flex;
            justify-content:center;
            align-item:center;
            flex-direction:column;
            margin-left: 20px;
        }

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body{
            line-height: 1.5;
        }

        .img-display{
            overflow: hidden;
            display: flex;
        }

        .product-content{
            padding: 2rem 1rem;
        }

        .product-title{
            font-size: 3rem;
            text-transform: capitalize;
            font-weight: 700;
            position: relative;
            color: #12263a;
            margin: 1rem 0;
        }

        .product-title::after{
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 80px;
            background: #12263a;
        }

        .product-price{
            margin: 1rem 0;
            font-size: 1rem;
            font-weight: 700;
            display: inline-block;
        }

        #highest-bid{
            padding-left: 100px;
        }


        .end-time{
            padding-top: 30px;
        }

        button{
            margin-top: 30px;
            height: 30px;
            width: 100px;
            background-color: cadetblue;
            font-weight: bold;
            border-radius: 5px;
        }

        .product-detail {
            margin-top: 40px;
        }

        .product-detail h2{
            text-transform: capitalize;
            color: #12263a;
            padding-bottom: 0.6rem;
        }

        .product-detail li{
            margin: 1rem 0;
            font-size: 0.9rem;
            font-weight: 600;
            opacity: 0.9;
        }

        @media screen and (min-width:992px){
            .card{
                display: grid;
                grid-template-columns: repeat(2,1fr);
            }
        }

    </style>
</head>
<body>
<ul><a href="hme.php"><img src="shopping-venture-g9f039e948_640.png" height="100px" width="130px"></a></ul>
    <?php
        session_start();
        if(!isset($_SESSION['username']) || !isset($_GET['item_id']))
        {
            echo"<h1 class='login'>Login First!</h1>";                   
        }
        else
        {
            require "connection.php";

            $iid = $_REQUEST['item_id'];
            $sql = "SELECT * FROM item WHERE item_id='$iid'";
            $result = mysqli_query($conn,$sql);

            $row = mysqli_fetch_assoc($result);
            $iid = $row['item_id'];
            $iname = $row['item_name'];
            $i_desc = $row['item_desc'];
            $iiprice = $row['init_bid'];
            $bid_num = $row['bid_num'];
            $icprice = $row['current_bid'];
            $iimg = "item/";
            $iimg = $iimg.$row['item_pic'];

    ?>

    <div class="card-wrapper">
        <div class="card">
            <div class="product-img">
                <div class="img-display">
                <img src="<?php echo $iimg;?>" alt="prod-img" id="prod-img" style='width:auto; max-width: 400px;'>
                </div>  
            </div>
            <div class="product-content">
                <p>Product ID: <?php echo "$iid";?></p>
                <p>Product: <?php echo "$iname";?></p>
                <p>Product Description: <?php echo "$i_desc";?></p>
                <p>Number of Bids: <?php echo "$bid_num";?></p>
                <p>Current Price: <?php echo "Rs $icprice";?></p>
                <button onclick="show_hide()" id="bid-bttn">BID</button>

                <div id="bidform">
                    <p><?php echo "Current Price : Rs".$icprice;?></p>
                    <form method="post" action="bid.php">
                        <input type="hidden" value='<?php echo "$iid"; ?>' name='item_id'>
                        <input type='hidden' value='<?php echo "$username"; ?>' name='username'>
                        <label> Enter Bidding Amount:</label>  
                        <input type="text" name="bid">&nbsp&nbsp&nbsp;
                        <input type='submit' value='Bid'>
                    </form>
                </div>    

                <script>
                    function show_hide()
                    {
                        var x=document.getElementById('bid-bttn');
                        if(document.getElementById('bidform').style.display=='none')
                        {
                            document.getElementById('bidform').style.display="block";
                        }
                        else
                        {
                            document.getElementById('bidform').style.display="none";
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <?php $conn->close(); } ?>
</body>
</html>