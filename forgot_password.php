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
      body
      {
        background: #e0e2dd;
      }
        .btn
        {
          background: #ff271d;
          color: white;
          padding: 2%;
          width: 100%;
        }
        .login
        {
            width: 40%;
            padding-top: 150px;
            padding-left: 500px;
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
label
{
    color: #01011e;
}

    </style>
</head>
<body>
    <div class="login">
    <?php
    $pin=$_GET['pin'];
    if($pin>0 && $pin<=999 && is_numeric($pin))
    {
      $pin1=rand(0,999);
      $pin1=123;
      if($pin==$pin1)
      {
      echo '
<form  method="post" action="">
  <h1 align="center"> Reset Admin Password <br> <hr></h1><br><br>
    <label>New Password    
        </label>       
        <input type="password" name="password1" required>   
        <br><br>   
        <label>  New Password*  </label>     <input type="password" name="password2" required >
        <br><br>    
         <input type="submit" value="Change Password">     
        <br><br>
      </form>';
    }
    else{
      echo "<script>alert('Wrong Password')</script>";
      header('refresh:0;url=forgot_password.php');
    }
    }
    else {
      echo '
        <form  method="get" action="">
            <h1 align="center"> Reset Admin Password <br> <hr></h1><br><br>
            <label> Enter the 3 digit OTP sent on your registered phone number </label>   <br> 
        <input type="password" name="pin" autocomplete="none" placeholder="Ex: 321 ">    
        <br><br> 
         <input type="submit" value="Reset Password">     
        <br><br>    
    </form>';
    }
      ?>
</div> 
        
    </body>
    </html>
<?php
        $conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
            header('LOCATION:home.php');
        }
        else
        {
            $use='admin';
            $password1=$_POST['password1'];
            $password2=$_POST['password2'];
            if(isset($password1)  && isset($password2) && $pin==$pin1)
            {
                if($password2==$password1)
                {
                    $md5pass1=md5($password1);
                    $sql1="update users set password='$md5pass1' where username='$use'";
                      if($result1=$conn->query($sql1))
                        {
                            echo "<script>alert('Password Updated Successfully')</script>";
                            header('refresh:0;url=adminlogin.php');
                        }
                        else
                        {
                          echo "<script>alert('Password not Updated')</script>";
                          header('refresh:0;url=adminlogin.php');
                        }
                }
                else{
                    echo "<script>alert('You Entered two different passwords')</script>";
                    header('refresh:0;url=forgot_password.php');
                }
            }
        }
        ?>

  