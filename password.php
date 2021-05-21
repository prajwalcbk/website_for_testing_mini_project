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
            session_start();
            $use=$_SESSION['username'];
            $password=$_POST['password'];
            $password1=$_POST['password1'];
            $password2=$_POST['password2'];
            if(isset($password1) && isset($password) && isset($password2))
            {
                if($password2==$password1)
                {
                    $md5pass=md5($password);
                    $md5pass1=md5($password1);
                    $sql="select password from users where username='$use'";
                    $result=$conn->query($sql);
                    $check=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    if($md5pass==$check['password'])
                    {
                        $sql1="update users set password='$md5pass1' where username='$use'";
                        if($result1=$conn->query($sql1))
                        {
                            echo "<script>alert('Password Updated Successfully')</script>";
                            header('refresh:0;url=home.php');
                        }
                        else{
                        echo "<script>alert('Password not Updated')</script>";
                        header('refresh:0;url=home.php');
                    }
                    }
                    else{
                        echo "<script>alert('Password not Updated Wrong password')</script>";
                        header('refresh:0;url=changepassword.php');
                    }
                }
                else{
                    echo "<script>alert('You Entered two different passwords')</script>";
                    header('refresh:0;url=changepassword.php');
                }
            }
        }
        ?>