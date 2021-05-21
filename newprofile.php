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
        .btn
        {
          background: #666363;
          color: white;
          padding: 2%;
          width: 100%;
        }
        #login
        {
            padding-top: 30px;
            padding-left: 90px;
             padding-right: 90px;
             font-size: 20px;
        }
        h1
        {
            font-size: 40px;
            padding-left: 5%
            padding-top:2%;
            padding-bottom: 2%;
            padding-right: 5%;
        }
        input[type=text],input[type=number], input[type=email], select {
  width: 100%;
  padding: 10px 5px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  width: 100%;
  background-color: #666363;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 30px;
  font-family: serif;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.login
{
    background-color: #f2f2f2;
}
label
{
    color: #01011e;
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
                <a class="submenu">Cell/Mobile/Wireless phones</a>
                <a class="submenu">Cameras</a>
                <a class="submenu">Laptop</a>
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
            <?php
        session_start();
        if(!isset($_SESSION['username']))
         {
           header('Location:login.php');
        }
        $conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
            header('LOCATION:home.php');
        }
        else
        {

            $use=$_SESSION['username'];
            $sql="select * from profile where username='$use'";
            $result=$conn->query($sql);
            $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            if(!isset($check))
            {
                $fname=$_POST['Fname'];
                $lname=$_POST['Lname'];
                $email=$_POST['email'];
                $number=$_POST['number'];
                $address=$_POST['address'];
                $pincode=$_POST['pincode'];
                $u=$_SESSION['username'];
                if(isset($fname) && isset($lname) && isset($email) && isset($number) && isset($address) && isset($pincode))    
                {

                    $sql="Insert into profile values ('$fname','$lname','$email','$number','$address','$pincode','$u')";
                    if(!$result=$conn->query($sql)){
                        echo "<script>alert('SQL Error occurred while Execution $sql')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Profile Created Successfully')</script>";
                        header('LOCATION:home.php');
                    }
                }
                
            }
            else
            {
                echo "<script>alert('Profile exists in Database')</script>";
                        header('LOCATION:home.php');
            }
}
        ?>
            <br><br><br>
            <div class="slider">
    <div class="login">    
        <form id="login" method="post" action="">  
        
            <h1 align="center"> Profile Details<hr></h1>
            <label>First Name  :      </label>    
        <input type="text" name="Fname" id="Uname" placeholder="First name" value="<?php echo $check['fname'];?>">    
        <br><br>  

        <label>Last Name  :    
            
        </label>       
        <input type="text" name="Lname" id="Uname" placeholder="Last name">    
        <br><br>   

        <label>  Email   : </label>     <input type="email" name="email" id="Pass" placeholder="email@gmail.com">    
          
        <br><br>    

        <label>Contact Number   : 
            
        </label>       
        <input type="number" name="number" id="Pass" placeholder="9876543210">    
        <br><br>    

        <label>Deliver Address   : 
            
        </label>       
        <input type="text" name="address" id="Pass">    
        <br><br>    

        <label>Pincode   : 
            
        </label>       
        <input type="number" name="pincode" id="Pass" placeholder="562102">    
        <br><br>    
            </table> 
        
         <!--<button type="submit" class="btn"><h3 align="center">Create Profile</h3></button> -->
         <input type="submit" value="Create Profile">     
        <br><br>    

        
    </form>   
</div> 
        </section>
    </body>
    </html>
    <?php
        session_start();
        if(!isset($_SESSION['username']))
         {
           header('Location:login.php');
        }
        $conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
            header('LOCATION:home.php');
        }
        else
        {

            $use=$_SESSION['username'];
            $sql="select * from profile where username='$use'";
            $result=$conn->query($sql);
            $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            if(!isset($check))
            {
                $fname=$_POST['Fname'];
                $lname=$_POST['Lname'];
                $email=$_POST['email'];
                $number=$_POST['number'];
                $address=$_POST['address'];
                $pincode=$_POST['pincode'];
                $u=$_SESSION['username'];
                if(isset($fname) && isset($lname) && isset($email) && isset($number) && isset($address) && isset($pincode))    
                {

                    $sql="Insert into profile values ('$fname','$lname','$email','$number','$address','$pincode','$u')";
                    if(!$result=$conn->query($sql)){
                        echo "<script>alert('SQL Error occurred while Execution $sql')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Profile Created Successfully')</script>";
                        header('LOCATION:home.php');
                    }
                }
                
            }
            else
            {

            }
}
        ?>

  