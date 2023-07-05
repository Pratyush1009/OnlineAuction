<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Auction</title>

    <style>

        *{
            margin: 1px;
        }

        body{
            background-color: #b3d9ff;
            height: 1500px;
        }

        .navbar{
            background:#a0a0fa; 
            border-radius: 15px;
            position:fixed;
            width: 100%;
        }

        .navbar ul{
            overflow:visible;
            display: flex;
            justify-content: space-between;
        }

        .navbar li{
            display: inline-block;
            list-style: none;
            /* margin: 10px 40px; */
        }

        #image li{
            margin-left: 20px;
        }

        a{
            text-decoration: none;
            color: black;
        }

        #image li{
            margin-left: 20px;
        }

        .content ul li{
            font-size: larger;
            margin:20px 40px;
        }

        .content ul li:hover{
            background: #3f7fe4;
            border-radius: 5px;
            width:max-content;
        }

        .sub-menu-1{
            display: none;
            font-size:medium;
        }

        .sub-menu-1 ul li{
            margin-left: -10px;
        }

        .content ul li:hover .sub-menu-1{
            display: block;
            position: absolute;
            background:#7878c9; 
            margin-top: 0px;
            /* margin-left: -10px; */
        }

        .content ul li:hover .sub-menu-1 ul{
            display: block;
            margin: 0px; 
        }

        .content ul li:hover .sub-menu-1 ul li{
            width: 150px;
            /* padding: 5px; */
            padding-bottom:20px;
            border-bottom: 1px dotted #fff ;
            background: transparent;
            border-radius: 0;
            text-align:left;
            margin-right:70%;
        }

        .content ul li:hover .sub-menu-1 ul li:last-child{
            border-bottom: none;
        }

        .content ul li:hover .sub-menu-1 ul li a:hover{
            background:#3f7fe4;
            border-radius: 5px;
            height: 35px;
            width: 150px;
            font-weight: bold;
        }


        footer{
            background-color: #1a0000;
            color: #fff;
            height: 10em;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; 
        }

        #footer-heading{
            font-size: 1.4em;
            padding: 10px;
        }

        .footer-content p {
            margin: 20px;
            padding: 20px;
        }

        .items-grid{
            display: grid;
            width: 95%;
            height: 100%;
            /* background-color: red; */
            grid-template-rows: 1fr 1fr 1fr 1fr;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            /* column-gap: 0px; */
            /* row-gap: 100px; */
            padding-top: 100px;
            margin-top:0px;
        }

        .items-grid li{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: max-content;
            height: max-content;
            text-align: center;
            list-style:none;
            margin: auto;
        }

        figure{
            /* text-align: center; */
            box-sizing: border-box;
            border: 1px solid transparent;
            
            
            padding: 20px;
            
        }

        #nav-button{
            padding:10px;
        }

        figure img{
            width: 14em;
        }

        
.content{
    display: flex;
    justify-content: center;
    align-items:center;
}

        figcaption p a,span{
            text-decoration: none;
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <ul>
            <div id="image">
                <li><a href="hme.html"><img src="shopping-venture-g9f039e948_640.png" alt="logo"
                            height="60px" width="100px"></a></li>
            </div>
            <div class="content">
                <ul>
                    <li id='nav-button'><a href="add_item.php">Sell Now</a></li>
                    <li id='nav-button'><a href="#">My Account</a>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="profile.php">Profile</a></li><br>
                                <li><a href="changepassword.php">Change Password</a></li>
                            </ul>
                        </div>
                    </li>
                    <li id='nav-button'><a href="#footer">Contact Us</a></li>
                    <li id='nav-button'><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </ul>
    </nav>

    <div class="item-display">
        <ul class="items-grid">
            <?php
                require "connection.php";
            
                $sql = "SELECT * FROM item";
                    $result = mysqli_query($conn,$sql);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $iid = $row['item_id'];
                        $iname = $row['item_name'];
                        $ipic = $row['item_pic'];
                        $icurrentp = $row['current_bid'];
                        $iimg = "item/";
                        $iimg = $iimg.$row['item_pic'];
                        // $link = "item_details.php?item_id=";
                        $link = "itemdisplay.php?item_id=";
                        $item_details = $link.$iid;
                        
            ?>
                        <li>
                            <figure>
                                <a class="product-img" href="<?php echo $item_details;?>"><img src="<?php echo "$iimg"; ?>" alt="product1"></a>
                                <figcaption>
                                    <p class="product-title"><a href="<?php echo $item_details;?>"><?php echo "$iname";?></a></p>
                                    <span class="product-price" id="product-1-price"><a href="<?php echo $item_details;?>"><?php echo "Rs $icurrentp";?></a></span>
                                </figcaption>
                            </figure>
                        </li>

                        <?php
                    }
                            $conn->close();
                        ?>
        </ul>
    </div>

    <footer id="footer">
        <p id="footer-heading">Online Auction Site</p>
        <p class="footer-content">For Further Details, Contact Pratyush Singh, @pratyushsingh.1009@gmail.com</p>
        <p class="footer-content">E-Commerce Website</p>
    </footer>
</body>

</html>