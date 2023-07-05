<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Auction</title>

    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="modal.css">

    <style>
        .navbar{
            background:#a0a0fa; 
            border-radius: 15px;
            position:fixed;
            width: 100%;
            font-family: 'Times New Roman', Times, serif;`
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
            grid-template-rows: 1fr 1fr 1fr 1fr;
            grid-template-columns: 1fr 1fr 1fr 1fr;
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
            box-sizing: border-box;
            border: 1px solid transparent;
            
            
            padding: 20px;
            
        }

        figure img{
            width: 14em;
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
                <li><a href="online_auction_system.php"><img src="shopping-venture-g9f039e948_640.png" alt="logo"
                            height="60px" width="100px"></a></li>
            </div>
            
            <div id="content">

                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto; border-radius:10% font-style:;">REGISTER</button>
                <button onclick="document.getElementById('id02').style.display='block'" style="width:auto; margin-left:30px; border-radius:10%;">LOGIN</button>
                <button type="button" onclick="document.getElementById('id03').style.display='block'" style="width:auto; margin-left:30px; border-radius:10%;">SELL</button>
                <button type="button" style="width:auto; margin-left:30px; border-radius:10%;"><a href="#footer" style="color: white" >CONTACT US</a></button>


                <div id="id01" class="modal">

                    <form class="modal-content animate" name="register" action="register.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>

                        <div class="container">
                                <fieldset>
                                    <legend style="margin-bottom: 20px;">Register</legend>
                                    <div id="middle">
                                        <label>Name :</label><br>
                                        <input type="text" name="fname" placeholder="Enter Your Name" autocomplete="off" style="margin-bottom: 40px;" required><br>
                                        <label>Phone No :</label><br>
                                        <input type="text" name="phone" placeholder="Enter Your Phone No" autocomplete="off" style="margin-bottom: 40px;" required><br>
                                        <label>Username</label><br>
                                        <input type="email" name="user" placeholder="Enter your Email" style="margin-bottom: 40px;" required><br>
                                        <label>Password</label><br>
                                        <input type="password" name="pass" placeholder="Enter Password" style="margin-bottom: 40px;" required><br>
                                        <input type="submit" name="submit" value="SIGN UP" style="margin-top: 15px;">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </form>
                </div>


	            <div id="id02" class="modal">

		            <form class="modal-content animate" name="login" action="signin.php" method="post">
			            <div class="imgcontainer">
				            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				        
			            </div>

			            <div class="container">
                            <fieldset>
                                <legend style="margin-bottom: 20px;">Sign In</legend>
                                <div id="middle">
                                    <label >Username</label><br>
                                    <input type="email" name="user" placeholder="Enter your Email" style="margin-bottom: 20px;"><br>
                                    
                                    <label >Password</label><br>
                                    <input type="password" name="pass" placeholder="Enter your Password"><br>
                    
                                    <input type="submit" style="margin-top: 20px;" value="SIGN IN"><br>
                                </div>
                            </fieldset>
			            </div>
	                </form>
	            </div>


                <div id="id03" class="modal">
                    <div class="modal-content animate">
                        <h1 id="login-heading" style="text-align:center";>LOGIN FIRST!!</h1>
                        <div class="data-input" id="bttn" style="background-color:#f1f1f1,height:fit-content;display:flex;justify-content:space-between;align-items:center;">                            <button type="button" onclick="document.getElementById('id03').style.display='none'; document.getElementById('id02').style.display='block'" class="login-bttn">Login</button>
                        </div>
                    </div>
	            </div>
            
                <script>
                    var modal = document.getElementById('id01');
                    window.onclick = function(event) 
                    {
                        if (event.target == modal) 
                        {
                            modal.style.display = "none";
                        }
                    }

                    var modal = document.getElementById('id02');
		            window.onclick = function(event) 
                    {
			            if (event.target == modal) 
                        {
				            modal.style.display = "none";
			            }
		            }

                    var modal = document.getElementById('id03');
                    window.onclick = function(event) 
                    {
                        if (event.target == modal) 
                        {
                            modal.style.display = "none";
                        }
                    }
                </script>


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
                        $link = "item_details.php?item_id=";
                        $item_details = $link.$iid;
                        
            ?>
                        <li>
                            <figure>
                                <a class="product-img" href="<?php echo $item_details;?>"><img src="<?php echo "$iimg"; ?>" alt="product1"></a>
                                <figcaption>
                                    <p class="product-title"><a href="item_details.php"><?php echo "$iname";?></a></p>
                                    <span class="product-price" id="product-1-price"><?php echo "Rs $icurrentp";?></span>
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