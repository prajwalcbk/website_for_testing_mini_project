<!DOCTYPE html>
<html>
<head>
    <title></title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="Style.css" rel="stylesheet" />
    <script src="Js/jquery-3.2.1.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster+Two|Pacifico');
    </style>
</head>
<body>
    <section>
        <div class="section1">
            <img src="images/Website_Logo.png" class="logo" />
           
            <div><div class="navigation" style="background:  #ececfa;">
            </div>
            <div class="navigation" style="background:  white">
            </div>

                <div class="navigation">
                <img src="images/if_List_Text_Menu_Numbers_String_Burger_1329080.png" class="toggle" />
                <br><br><br>
                <a class="cgr" >Categories</a>
            </div>
                <a class="submenu" href="products.php?p=1" style="color:black;">Cell/Mobile/Wireless phones</a>
                <a class="submenu" href="products.php?p=2" style="color:black;">Cameras</a>
                <a class="submenu" href="products.php?p=3" style="color:black;">Laptop</a>
            </div>

            <p class="para1">Specials</p>
            <div class="Special">
                <fieldset>
                    <legend>Sale</legend>
                    <div class="div1">
                        <img src="images/y37-high-figure.png" class="img1" />
                    </div>
                    <div class="div2">
                        <h3>$21990<strike>$402.30</strike></h3>
                        <p><a href="product.php?p=12" style="color:black">vivo Xshot 5.2 inch 4G Android 4.2 Quad Core 2.3GHz RAM 2GB ROM 16GB</a></p>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Sale</legend>
                    <div class="div1">
                        <img src="images/Canon-EF-24-105mm-f-4L-IS-II-USM-Side_tcm14-1451451.png" class="img1" />
                    </div>
                    <div class="div2">
                        <h3>$25115<strike>$134.16</strike></h3>
                        <p><a href="product.php?p=13" style="color:black">Canon EF 75-300mm f/4.0-5.6 III Lens</a></p>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Sale</legend>
                    <div class="div1">
                        <img src="images/12.jpg" class="img1" />
                    </div>
                    <div class="div2">
                        <h3>$116990<strike>$156990</strike></h3>
                        <p><a href="product.php?p=36" style="color:black">ACER Predator Helios 300 Core</a></p>
                    </div>
                </fieldset>

                
            </div>



        </div>
        <div class="section2">

            <nav>
                <a class="menuitem" href="home.php">Home</a>

                                <?php session_start(); 
                                if(!isset($_SESSION['username']))
                                 {
                echo "<a class='menuitem' href='login.php'>Seller</a>"; 
                echo "<a class='menuitem' href='signup.php'>Sign up </a>"; 
                echo "<a class='menuitem' href='login.php'>Login</a>"; 
                } else 
                {
                 echo "<a class='menuitem' href='cart.php'>My Shopping Cart</a><a class='menuitem' href='orders.php'>My
                Orders</a><a class='menuitem'href='profile.php'>My Profile</a>"; 
                echo "<a class='menuitem'>".$_SESSION['username']."</a>"; 
                echo "<a class='menuitem' href='logout.php'>Logout</a>"; 
            } ?> 
        </nav> 
        <form action="search.php" method="POST">
            <input type="text"  placeholder="search" class="txtsrch" name='search'/>
        <button type="submit"  class="btnsrch">Search</button> <br><br><br> 
        <div class="slider"> 
            <div  class="slides">
             <div class="slide1"> 
                <img src="images/4-2-iphone-png-picture-png-image.png" class="img1" />
                 </div> 
                 <div class="constant"> <h1>iPhone 7</h1> 
                    <p>Comfort is a very important things
                nowadays because it is a condition of satifaction.</p>

                        <a class="btnshopnow" href="product.php?p=1">Shop Now!</a>
                    </div>
                </div>
            </div>


           
            <p class="featuredpara">Latest</p>

            <div class="products">
                <fieldset class="col1">
                    <div>
                        
                        <legend>New</legend>
                        <a href="product.php?p=35" style="color:black">
                        <img src="images/Laptop.png" class="img1" />
                        <h3>$1299.00<strike>$1499.00</strike></h3>
                        
                        <h4>Apple MacBook Pro 13-inch Laptop (Intel Dual-Core i5 2.4 GHz, 4 GB RAM, 500 GB HDD, Intel HD, OS X) - Silver - 2011</h4></a>
                        <p>Fastest dual-core processor available Thunderbolt technology FaceTime HD camera Long lasting battery...</p>
                    </div>
                </fieldset>

                <fieldset class="col2">
                    <div>

                        <legend>New</legend>
                        <a href="product.php?p=24" style="color:black">
                        <img src="images/Canon_Camera.png" class="img1" />
                        
                        <h3>Rs $44520s<strike>$642.45</strike></h3>
                        
                        <h4>Canon EOS 200D Digital SLR Camera with EF-S 18 - 55 mm f/4-5.6 IS</h4></a>
                        <p>24.2 megapixel CMOS sensor for photos rich with detail and colour and look straight from the camera. Continuous shooting at up to 5 FTP...</p>
                    </div>
                </fieldset>

            </div>


            <p class="featuredpara">Featured</p>

            <div class="products" >
                <fieldset class="col1">
                    <div>
                         <legend>Hot Deal</legend><a href="product.php?p=20" style="color:black">
                        <img src="images/8.jpg" class="img1" />
                        <h3>59995 <strike>$259.81</strike></h3>
                         
                        <h4>Canon PowerShot G5 X </h4>
                    </a>
                        <p>Effective Pixels: 20.2MP Optical Zoom: 4.2x | Digital Zoom: 4.2x Display Size: 3inch </p>
                    </div>
                </fieldset>

                <fieldset class="col2">
                    <div>
                        
                        <legend>New</legend>
                        <a href="product.php?p=29" style="color:black">
                        <img src="images/5.jpg" class="img1" />
                        <h3>Rs $44520s<strike>$642.45</strike></h3>
                        
                        <h4>Mi Notebook 14 Core i5 10th Gen </h4></a>
                        <p>Stylish & Portable Thin and Light Laptop 14Inch Full HD Backlit Anti-glare Display Light Laptop without Optical Disk Drive 512GB SSD capacity 8GB RAM</p>
                    </div>
                </fieldset>
            </div>


        </div>
    </section>

    <div class="background"></div>


        <hr />
</body>
</html>