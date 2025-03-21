<?php

$servername="localhost";
$username="root";
$password="";
$dbname="yashika";
$con=new mysqli($servername,$username,$password,$dbname);
$name=$_POST['cat'];
$slug=$_POST['slug'];

$cat_2=$_POST['cat_2'];
$slug_2=$_POST['slug_2'];


$sql="INSERT INTO `cat_2`( `category`, `slug`, `category_2`, `slug_2`) VALUES ('$name','$slug','$cat_2','$slug_2')
";

if($run=mysqli_query($con,$sql)){
echo" <script>
 alert('successfully added');
 window.location.href='home_1.php'
</script>";
}




?>