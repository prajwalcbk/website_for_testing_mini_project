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
          background: #ff271d;
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
        input[type=password]{
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
  background-color: red;
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
  background-color: red;
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
            
            <br><br><br>
            <div class="slider">
    <div class="login">    
        <form id="login" method="post" action="password.php">  
        
            <h1 align="center"> Change Password <hr></h1>
            <label>Old Password       </label>    
        <input type="password" name="password" autocomplete="none">    
        <br><br>  

        <label>New Password  
            
        </label>       
        <input type="password" name="password1" required>   
        <br><br>   

        <label>  New Password   </label>     <input type="password" name="password2" required >
          
        <br><br>    

       
        
         <!--<button type="submit" class="btn"><h3 align="center">Create Profile</h3></button> -->
         <input type="submit" value="Change Password">     
        <br><br>    

        
    </form>   
</div> 
        </section>
    </body>
    </html>

  