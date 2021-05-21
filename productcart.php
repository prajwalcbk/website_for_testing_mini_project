<?php
		session_start();
        if(!isset($_SESSION['username']))
         {
           header('Location:login.php');
        }
		$quantity=$_POST['quantity'];
		$v=$_POST['productid'];
		$p=$_GET['p'];
		$conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
        }
        else
        {
			if(isset($quantity) && isset($v) && is_numeric($quantity) && is_numeric($v))
	        {
	        	session_start();
	            $user=$_SESSION['username'];
	            $sql="Insert into cart values ('$user','$v','$quantity')";
	            
	            if($result=$conn->query($sql)){
	               echo "<script>alert('Added to Cart Successfully')</script>";
	               header('LOCATION:cart.php');
	            }
	            else
	            {
	                echo "<script>alert('Error Occurred While Inserting Products')</script>";
	                header('LOCATION:home.php');
	            }
	        }
	        if(isset($p) && is_numeric($p))
	        {
	        	session_start();
	        	$user=$_SESSION['username'];
	        	$sql="Delete from cart where c1username='$user' and c1productid='$p'";

	        	if($result=$conn->query($sql)){
	               echo "<script>alert(Deleted from Cart Successfully')</script>";
	               header('LOCATION:cart.php');
	            }
	            else
	            {
	                echo "<script>alert('Error Occurred While removing Products')</script>";
	                header('LOCATION:home.php');
	            }

	        }
	        else{
	        	echo "<script>alert('Error Occurred While removing Products inavlid Product id')</script>";
	        	header('refresh:0;url=cart.php');
	        }
	    }
?>