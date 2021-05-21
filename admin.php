<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style type="text/css">
  body
      {
        background: #e0e2dd;
      }
      .nav
      {
        padding-top:2%;
        padding-left: 70%;
      }
      .menuitem{
        font-family: serif;
    margin-top:1vh;
    padding:3% 3% 3% 3%;
    text-decoration:none;
    background-color: silver;
    color:black;
}

.menuitem:hover{
    background-color:#1d9550;
    box-shadow:none;
}
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
 

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #e06666;
  color: black;
}
button
{
  font-family: serif;
  background-color: #e06666;
  color: black;
  font-size: 120%;
}
    </style>
</head>
<body>
    <?php
                                                        session_start();
                                                        if(!isset($_SESSION['username']) || !$_SESSION['username']=='admin')
                                                        {
                                                            header('Location:adimlogin.php');
                                                        }
                                                        else
                                                        {
                                                            echo "<div class='nav'><h2>";
                                                            echo "<a class='menuitem' href='admin.php'>".$_SESSION['username']."</a>";
                                                            echo "<a class='menuitem' href='logout.php'>Logout</a></h2></div>";
                                                        }
                ?>
<h1 align="center"> Admin Dashboard </h1>
<hr>
<br>
<h3> Add Product : </h3>
<form action="" method="POST" enctype="multipart/form-data">
<table border="2" id='customers'>
  <tr><th>Product Name </th><th> Product Description </th> <th> Seller </th> <th> Category </th> <th> Image </th> <th> price</th> <th> </th> </tr>
  <tr><td><input type="text" name="name" required></td><td><textarea rows="10" cols="55" style='resize:none' name='description' required></textarea></td>
    <td>
    <input type="radio" name="seller" value="prajuu" required> Prajwal <br>
    <input type="radio" name="seller" value="amith" required> Amith <br>
    <input type="radio" name="seller" value="koteesh"required> Koteesh <br> 
  </td>
  <td>
    <input type="radio" name="Category" value="1" required> Mobiles <br>
    <input type="radio" name="Category" value="2" required> Cameras <br>
    <input type="radio" name="Category"value='3' required> Laptops <br> 
  </td>
  <td>
    <input type="file"  name="image" required>
  </td>
  <td>
    <input type="text" name="price" required>
  </td>
  <td>
    <input type="submit" value="ADD">
  </td>
</tr>
</table>
</form>
<?php
session_start();
if(!isset($_SESSION['username']) || !$_SESSION['username']=='admin')
{
    header('Location:adimlogin.php');
}
$name=$_POST['name'];
$description=$_POST['description'];
$susername=$_POST['seller'];
$category=$_POST['Category'];
$image = $_FILES['image']['tmp_name'];
$image = addslashes(file_get_contents($image));
$price=$_POST['price'];

if(isset($name) && isset($description) && isset($susername) && isset($category) && isset($image) && isset($price))
{
        $conn=new mysqli('localhost','root','','miniproject');
        $user=mysqli_real_escape_string($conn,$user);
        if($conn->connect_errno)
        {
            echo "<script>alert('Database Connection error $conn->connect_errno')</script>";
        }
        else
        {
          $sql="Insert into product(name, price , category ,image ,  description , susername) values ('$name' , '$price' , '$category'  ,'{$image}' ,'$description' , '$susername')";
          echo $sql;
          if(!$result=$conn->query($sql)){
                echo("Error description: " . $conn -> error);
                echo "<script>alert('Error while Inserting data')</script>";
            }
            else
            {
                echo "<script>alert('Inserted Successfully')</script>";
                header('refresh:0;url=admin.php');
            }
        }

}


?>



</body>
</html>