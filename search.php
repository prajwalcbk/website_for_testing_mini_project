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
    <style>
        .profile
        {
            padding-top: 30px;
            padding-left: 90px;
            padding-right: 90px;
            padding-bottom: 30px;
        }
        h1
        {
            font-size: 40px;
        }
        .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 18px;
}

#customers tr:nth-child(even){background-color: white;}

#customers tr:hover {background-color: white;}

#customers th {
  padding-top: 20px;
  padding-bottom: 20px;
  text-align: left;
  background-color: #5B665C;
  color: white;
}

    </style>
</head>
<body>
    <section>
        <div class="section1">
            <img src="images/Website_Logo.png" class="logo" />
            <div class="navigation" style="background: white;"><!--#ececfa;"> -->
            </div>
            <div class="navigation">

                <img src="images/if_List_Text_Menu_Numbers_String_Burger_1329080.png" class="toggle" />
                <a class="cgr" >Categories</a>
            </div>
            <div>
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
                        <h3>$399<strike>$402.30</strike></h3>
                        <p>vivo Xshot 5.2 inch 4G Android 4.2 Quad Core 2.3GHz RAM 2GB ROM 16GB</p>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Sale</legend>
                    <div class="div1">
                        <img src="images/Canon-EF-24-105mm-f-4L-IS-II-USM-Side_tcm14-1451451.png" class="img1" />
                    </div>
                    <div class="div2">
                        <h3>$133.89<strike>$134.16</strike></h3>
                        <p>Canon EF 75-300mm f/4.0-5.6 III Lens</p>
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
                

                <?php
                 session_start();
                if(!isset($_SESSION['username']))
                 {
                     //header('Location:login.php');
                   echo " <a class='menuitem' href='signup.php'>Sign up </a>
                <a class='menuitem' href='login.php'>Login</a> ";
                }
                 else
                 {
                      echo "<a class='menuitem' href='cart.php'>My Shopping Cart</a><a class='menuitem' href='orders.php'>My Orders</a>";
                      echo "<a class='menuitem' href='profile.php'>My Profile</a>";
                      echo "<a class='menuitem'>".$_SESSION['username']."</a>";
                      echo "<a class='menuitem' href='logout.php'>Logout</a>";
                 }
        
                                                        
                ?>
            </nav>
            <?php
            $conn=new mysqli('localhost','root','','miniproject');
            $user=mysqli_real_escape_string($conn,$user);
            if($conn->connect_errno)
            {
                echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
            }
            else
            {
                $p=$_POST['search'];
                if(!isset($p))
                {
                    header('LOCATION:home.php');
                }
                if(isset($p))
                {
                    $sql="select * from product where name like '%$p%'";
                    //echo $sql;

                    if($result=$conn->query($sql))
                    {
                    echo "<br><br><br><br><hr><br><h1 align='center'>Search Results</h1><br><hr>";
                    echo "<table id='customers'><tr>";
                    $i=0;
                    while($check=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                        if($i%3==0)
                            echo "</tr><tr>";
                        echo "<td>";
                        $id=$check['id'];
                        echo "<a href='product.php?p=$id' style='color:black'>";
                        echo ' <img style="width:60%; height:60%;" class="d-block " src = "data:image/jpeg;base64,' . base64_encode($check['image']) . '" />';
                        echo "<br><br><b align='center'>".$check['name']."</b></a></td>";
                        $i+=1;
                    }  
                    echo "</tr></table>";
                }
                else
                {
                    echo("<br><br><br>Error description: " . $conn -> error);
                }

                }
                else{
                    header('LOCATION:home.php');
                }
            }
        ?>
            </div>
        </section>
    </body>
    </html>