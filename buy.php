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
            $sql2="select * from profile where username='$use'";
            $result2=$conn->query($sql2);
            $check=mysqli_fetch_array($result2,MYSQLI_ASSOC);
            if(isset($check))
            {
                $sql="Insert into `order` (ousername , oproductid , oquantity , paymentmode , status )  select '$use',id,quantity,'cash','delivered' from cart ,product where c1username='$use' and c1productid=id";
                    if($result=$conn->query($sql))
                    {
                        $sql1="delete from cart where c1username='$use'";
                        if($result1=$conn->query($sql1)){
                           echo "<script>alert('Order Placed Successfully')</script>";
                           header('LOCATION:orders.php');
                        }
                    }
                    else
                    {
                        echo "<script>alert('Error Occurred While Ordering')</script>";
                        header('LOCATION:home.php');
                    }
            }
            else{
                echo "<script>alert('Profile not Created')</script>";
                    header('refresh:0;url=newprofile.php');
            }



        }
?>