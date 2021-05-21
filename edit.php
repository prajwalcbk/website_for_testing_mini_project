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

                $fname=$_POST['Fname'];
                $lname=$_POST['Lname'];
                $email=$_POST['email'];
                $number=$_POST['number'];
                $address=$_POST['address'];
                $pincode=$_POST['pincode'];
                if(isset($fname) && isset($lname) && isset($email) && isset($number) && isset($address) && isset($pincode))    
                {

                    $sql="Update profile set fname='$fname' , lname='$lname' , email='$email' , number='$number' ,address='$address' , pincode='$pincode' where username='$use'";
                    if(!$result=$conn->query($sql)){
                        echo "<script>alert('SQL Error occurred while Execution $sql')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Profile Updated Successfully')</script>";
                        header('LOCATION:profile.php');
                    }
                }

                
            }
        ?>