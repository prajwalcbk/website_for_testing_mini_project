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
        .btn
        {
          background: #ff271d;
          color: white;
          padding: 2%;
          width: 100%;
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

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

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
            <div class="navigation" style="background: white">
            </div>
            <div class="navigation" style="background: white">
            </div>

                 <div class="navigation">
                <img src="images/if_List_Text_Menu_Numbers_String_Burger_1329080.png" class="toggle" />
                <a class="cgr" >Categories</a>
            </div>       
            <div>
                <a class="submenu" href="products.php?p=1" style="color:black;" >Cell/Mobile/Wireless phones</a>
                <a class="submenu" href="products.php?p=2" style="color:black;">Cameras</a>
                <a class="submenu" href="products.php?p=3" style="color:black;">Laptop</a>
            </div>

           
            <div class="Special">
                

                
            </div>



        </div>
        <div class="section2">

            <nav>
                <a class="menuitem" href="home.php">Home</a>

                <?php
                 session_start();
                if(!isset($_SESSION['username']))
                 {
                     header('Location:login.php');
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
                $use=$_SESSION['username'];
                $sql="select id,name,quantity,price from cart ,product where c1username='$use' and c1productid=id;"; 
                $result=$conn->query($sql);
                echo "<br> <br><br><br><br> <h1 align='center'> My Shopping Cart </h1>  <br><hr><br><br><br>
                        <table id='customers'>
                        <tr><th>SL No</th><th>Product</th><th>Quantity</th><th>Price</th></tr>";
                $i=1;
                $total=0;
                while($check=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                            $total+=$check['quantity']*$check['price'];
                            $id=$check['id'];
                            echo "<tr><td>".$i."</td><td><a style='color:black' href='product.php?p=$id' >".$check['name']."</a> <a href='productcart.php?p=$id' > Remove </a></td><td>".$check['quantity']."</td><td>".$check['price']*$check['quantity']."</td></tr>";
                            $i=$i+1;

                }
                        echo "<tr><td></td><td></td><td>Total</td><td>$total</td></tr>";
                        echo "</table><br><br>";

                }
        ?>
        <b>Mode of Payment</b><br> <br>
        <input type="radio" name="payment" checked> 
        Cash on delivery
        <br><br>
        <br>
         <form action="buy.php" method="POST">
          <button type="submit" class="btn"><h2 align="center" style="font-family: serif;">CONFIRM ORDER</h2></button>
        </form><br>
        <hr>
       
            </div>

        </section>
    </body>
    </html>