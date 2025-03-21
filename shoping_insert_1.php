<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="yashika";
$con=new mysqli($servername,$username,$password,$dbname);
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
 
$id=$_GET['id'];
$sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE id='$id'";
$runn = mysqli_query($con, $sqll);
$roww=mysqli_fetch_assoc($runn);

$email = $_SESSION['email'];
$pname= $roww['name'];

$price=$roww['price'];
$pic=$roww['pic'];




$sqli="INSERT INTO `payment`( `uname`, `pname`, `pic`, `price`) VALUES ('$email','$pname','$pic','$price')";
if($rin=mysqli_query($con,$sqli)){
    header("Location: shoping-cart.php"); 
}

?>