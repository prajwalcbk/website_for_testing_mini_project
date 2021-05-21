<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="index_style.css">    
</head>    
<body>    
    <h1 align="center" style="color: white">Login Page</h1><br>    
    <div class="login">    
    <form id="login" method="post" action="login.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>     
        <input type="Password" name="password" id="Pass" placeholder="Password">    
        <br><br>    <b>
        <input type="submit" name="log" id="log" value="Log In Here"> </b>      
        <br><br>    
        <a class="signup" href="signup.php"><h3> Create new account</h3> </a>   
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
            $sql="select * from users where username='$user_name' and password='$password' ";
            $result=$conn->query($sql);
            $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
            if(isset($check)){
                session_start();
                $_SESSION['username']=$check['username'];
                echo "<script>alert('Login Successfull')</script>";
                header('refresh:0;url=home.php');
            }
            else
            {
                echo "<script>alert('Incorrect username and password')</script>";
            }
        }
}
?>  