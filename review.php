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
            $text=$_POST['review'];
            $id=$_POST['productid'];
            $sql2="Insert into comment values ('$id','$use','$text')";
            echo $sql2;
            if($result2=$conn->query($sql2)){
                echo "<script>alert('Successfully Submitted')</script>";
                header('LOCATION:home.php');

            }
            else
            {
                echo "<script>alert('Error Occurred While Submission')</script>";
                header('LOCATION:home.php');
            }
        }

?>