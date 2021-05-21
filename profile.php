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
        *
        {
            font-family: serif;
        }
        .profile
        {
            padding-top: 30px;
            padding-left: 90px;
            padding-right: 90px;
            padding-bottom: 30px;
            font-size: 18px;
        }
        h1
        {
            font-size: 40px;
        }
        .btn
        {
          background: #666363;
          color: white;
          padding: 2%;
          width: 100%;
          border: 3px solid white;
        }
        .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

    </style>
</head>
<body>
    <section>
        <div class="section1">
            <img src="images/Website_Logo.png" class="logo" />
            <div class="navigation" style="background: white">
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
            $sql="select * from profile where username='$use'";
            $result=$conn->query($sql);
            $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
            if(isset($check)){
                echo '<br><br><br><br>
                <h1 align="center"> My Profile </h1><br>
                <hr>
            <div class="slider">
    <div class="profile">    
        <h2 style="color: orange;">User Details</h2><hr>
        <br>
         First Name : '.$check['fname'] .'<pre>          </pre>  Last Name : '.$check['lname'] .
        '<br><br>
         username : '.$use.'<br><br>
        <h2 style="color: orange;">Contact Details</h2><hr><br>

        Email  : '.$check['email'] .'<br><br> 
        Phone Number : '.$check['number'] .' <br><br> 
        Address  : '.$check['address'] .' <br><br>
        Pincode : '.$check['pincode'].'
        <br><br><br><hr><br>';

        echo '<form action="editprofile.php" method="POST">
          <b><button type="submit" class="btn"  ><h2 align="center">EditProfile</h2></button></b>
        </form>
        <br>
        <form action="changepassword.php" method="POST">
          <b><button type="submit" class="btn"><h2 align="center">Change Password </h2></button></b>
        </form><br></div> </div>';
            }
            else
            {
                header('LOCATION:newprofile.php');
            }
        }
        ?>
            </div>
        </section>
    </body>
    </html>
  