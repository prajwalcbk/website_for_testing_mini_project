<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="index_style.css">   
    <script>
        var check = function() {
    if (document.getElementById('password').value ==
             document.getElementById('confirm_password').value) {
             document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password Matched';
            document.getElementById('submit').disabled = false;
          } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Password didnt match to previous one ';
            document.getElementById('submit').disabled = true;
          }
        } 

    </script> 
</head>    
<body>

    <h1 align="center" style="color: white">Login Page</h1><br>   
    <div class="login">    
    <form id="login" method="POST" action="">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username" required>    
        <br><br>    
        <label><b>Password</b></label><br>    
        <input type="Password" name="password" id="password" placeholder="Password" required>    
        <br><br>
        <label><b>Renter Password</b></label><br> 
        <input type="Password" name="confirm_password" id="confirm_password" required placeholder="type Password again" onkeyup='check();'>    
        <br><br>  
       <b> <span id='message'></span> </b>
       <br><br>
        <input type="submit"  id="submit" value="Create Account">       
        <br><br>
        <a class="signup" href="login.php"><h3> Already have an Account</h3></a>   
    </form>     
</div>    
</body>    
</html> 


<?php
$user_name=$_POST['Uname'];
$password=md5($_POST['password']);

if(isset($user_name) && isset($password))    
{

        $conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
        }
        else
        {
            $sql="Insert into users values ('$user_name','$password')";
            if(!$result=$conn->query($sql)){
                echo("Error description: " . $conn -> error);
                echo "<script>alert('Username Exists in database Account Not Created ')</script>";
            }
            else
            {
                echo "<script>alert('Account Created Successfully')</script>";
                header('LOCATION:login.php');
            }
        }
}
?>   
    
