<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce Website Single Product</title>


	<link rel="stylesheet" type="text/css" href="product_style.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <style type="text/css">
    *{
      font-family: serif;
    }
    .section2{
    width:68vw;
    display:inline-block;
}
nav{
    margin-top:10vh;
    width:100%;
    height:2%;
    background-color:white;
    border-radius:6px;
    display:flex;
    justify-content:center;
    align-items:center;
}

.menuitem{
    margin-top:1vh;
    padding:3% 3% 3% 3%;
    text-decoration:none;
    background-color:black;
    color:white;
    font-size:1.2vw;
    box-shadow:10px 15px 50px black;
}
.menuitem:hover{
    background-color:#1d9550;
    box-shadow:none;
}
a:not([href]):not([tabindex]) {
    color: white;
  }

  /*Section 1*/
.section1{
    margin-left:5%;
}

.logo{
    width:23vw;
    height:20vh;
}
@media only screen and (max-device-width: 480px) {
    table#all_results {
        width: auto;
    }
    td#main_box {
        width: 320px;
    }
    td#side_box {
        width: 320px;
    }
}

.navigation{
    margin-top:2vh;
    width:100%;
    height:7vh;
    background-color:#19e5e5;
    border-radius:6px;
    display:flex;
    align-items:center;
}

.toggle{
    height:5vh;
    width:2vw;
    margin-left:3%;
}
.cgr{
    margin-left:3%;
}

.submenu{
    background-color:#ececfa;
    display:block;
    padding:4% 4%;
    border-bottom:1px solid #a7a7ad;
    padding-left:4%;
}

.submenu:hover{
    cursor:pointer;
    background-color:#ffffff;
}

.section1 .para1{
    padding:4% 4%;
    background-color:#ececfa;
    margin-top:10%;
    margin-bottom:2%;
}

.section1 .Special fieldset{
    background-color:#ececfa;
    border:1px solid #afafaf;
    margin-top:10%;
    height:23vh;
}

.section1 .Special .img1{
    width:5vw;
    height:17vh;
    padding-top:7%;
    padding-left:3%;
}

.section1 .Special .div1{
    display:inline-block;
    margin-left:5%;
}

.section1 .Special .div2{
    position:absolute;
    display:inline-block;
    margin-left:1%;
    width:10%;
    height:15%;
}

.Special h3{
    margin-bottom:2%;
    margin-top:7%;
    color:#04bfbf;
}
.Special strike{
    font-size:1vw;
    padding-left:4%;
}

.section1 .Special fieldset:nth-child(2) .img1{
    height:18vh;
    width:6vw;
    padding-left:3%;
}

.section1 .Special fieldset:nth-child(3) .img1{
    height:14vh;
    width:5vw;
    padding-left:3%;
}

.section1 .Special fieldset:nth-child(4) .img1{
    height:12vh;
    width:5vw;
}

.background{
    position:absolute;
    right:0;left:0;bottom:0;top:0;
    z-index:2;
    width:100vw;
    height:30vh;
    background-color:#ececfa;
}

section{
    display:flex;
    /*position:absolute;*/
    z-index:4;
}
  </style>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  <section>
        <div class="section1">
            <img src="images/Website_Logo.png" class="logo" />
            <div class="navigation">
                <img src="images/if_List_Text_Menu_Numbers_String_Burger_1329080.png" class="toggle" />
                <a class="cgr" style="color:black;">Categories</a>
            </div>
            <div style="color:black;">
                <a class="submenu"  href="products.php?p=1"  style="color:black;">Cell/Mobile/Wireless phones</a>
                <a class="submenu" href="products.php?p=2" style="color:black;">Cameras</a>
                <a class="submenu" href="products.php?p=3" style="color:black;">Laptop</a>
            </div>
          </div>  

	<div class="section2">

            <nav>
                <a class="menuitem" href="home.php">Home</a>

                <?php
                                                        session_start();
                                                        if(!isset($_SESSION['username']))
                                                        {
                                                            echo "<a class='menuitem' href='signup.php'>Sign UP </a>";
                                                            echo "<a class='menuitem' href='login.php'>Login</a>";
                                                        }
                                                        else
                                                        {
                                                            echo "<a class='menuitem' href='cart.php'>My Shopping Cart</a><a class='menuitem' href='orders.php'>My Orders</a><a class='menuitem'href='profile.php'>My Profile</a>";
                                                            echo "<a class='menuitem'>".$_SESSION['username']."</a>";
                                                            echo "<a class='menuitem' href='logout.php'>Logout</a>";
                                                        }
                ?>
            </nav>

          
<!------------Single Product--------->
<section class="single-product">
<div class="container">
<div class="row">
<div class="col-md-5">
<div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">

  <?php
  $v=$_GET['p'];
        $conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
        }
       if(isset($v))
        {
            $sql="select * from product where id=$v";
            if($result=$conn->query($sql))
            {
                $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if(!isset($check))
                {
                  echo "<script>alert('Item not Found')</script>";
                  header('LOCATION:home.php');
                }
            }
            else{
              echo("Error description: " . $conn -> error);
            }


        }
        else
        {
          echo "<script>alert('Item not Found')</script>";
              header('LOCATION:home.php');

        }
        
          ?>
<?php
$v1=$check['image'];
echo '<img style="width: 100%; height:100%;" class="d-block " src = "data:image/jpeg;base64,' . base64_encode($check['image']) . '" />';
//echo '<img style="width: 100%; height:100%;" class="d-block" '. base64_encode($check['image']) . '" />';
?>

</div>
</div>
</div>
</div>
<div class="col-md-7">
	<p class="new-arrival text-center">NEW</p>

  <h2><?php echo $check['name'];?> </h2>
	
    
     <i class="fa fa-star"></i>
     <i class="fa fa-star"></i>
     <i class="fa fa-star"></i>
     <i class="fa fa-star"></i>
     <i class="fa fa-star"></i>
     <i class="fa fa-star-half-o"></i>

<p class="price">Rs $<?php echo $check['price'];?> </p>

<p><b>Availability:</b>In Stock</p>
<p><b>Condition:</b>New</p>
<form action='productcart.php' method="POST">
<?php echo "<input type='hidden' name='productid' value='$v'>"; ?>
<label>Quantity:</label>
<input type="text" name='quantity' value="1">
<button type="submit" class="btn btn-primary">Add to Cart</button>
</form>
</div>
</div>
</div>
</section>

<!----------product-description ------>
<section class="product-description">
	<div class="container">
		<h6>Product Description</h6>
		
    <p>
      <?php echo $check['description'];?>
      </p> 
<hr>

<?php
        session_start();
        if(isset($_SESSION['username']))
        {
            $user=$_SESSION['username'];
            $sql="select * from `order`  where oproductid=$v and ousername='$user'";
            if($result=$conn->query($sql))
            {
                $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if(isset($check))
                {
                  echo "<h5>Write a Review about this Product </h5><hr>";
                  echo "<form action='review.php' method='POST'>";
                 // echo "<input type='text' style='height:100px; width:800px;' >";
                  echo "<textarea rows=4 cols=70 style='resize:none' name='review' required> </textarea>";
                  echo "<input type='hidden' name='productid' value='$v'>";
                  echo '<br><button type="submit" class="btn btn-primary">Submit</button>';
                  echo "</form>";
                }
            }
            else{
              echo("Error description: " . $conn -> error);
            }
        }
          ?>
<?php
      $sql="select * from comment , profile where productid='$v' and username=cusername";
      if($result=$conn->query($sql))
      {
          echo "<br><h5>Reviews<h5><hr>";
          while($check=mysqli_fetch_array($result,MYSQLI_ASSOC))
          {
              echo "<h6> ".$check['fname']." </h6> ".$check['message'];
          }
        }

?>

	</div>
</section>


</div>
</section>
<!-----------Footer--------->
<section class="footer">
  <div class="container text-center">
    <div class="row">
        <div class="col-md-3">
           <h1>Useful Links</h1>
           <p>Privacy Policy</p>
           <p>Terms of Use</p>
           <p>Return Policy</p>
           <p>Discount Coupons</p>
         </div>

          <div class="col-md-3">
               <h1>Company</h1>
               <p>About Us</p>
               <p>Contact Us</p>
               <p>Career</p>
               <p>Affiliate</p>
         </div>


         <div class="col-md-3">
          <h1>Follow Us On</h1>
          <p><a href="facebook.com"><i class="fa fa-facebook-official"></i>Facebook</p>
          <p><a href="youtube.com"><i class="fa fa-youtube-play"></i>Youtube</p>
          <p><a href="linkedin.com"><i class="fa fa-linkedin"> </i> Linkedin</p>
          <p><a href="twitter.com"><i class="fa fa-twitter"></i> Twitter</p>
        </div>
        <div class="col-md-3 footer-image">
          <a href="https://play.google.com/store">
          <h1>Download App</h1>
          <img src="images/app-logo.png">
        </div>
     </div>
     <hr>
  </div>
</section>


</body>
</html>