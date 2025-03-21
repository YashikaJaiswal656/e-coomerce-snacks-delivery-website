<?php



$username="root";
$password="";
$server="localhost";
$db="yashika";

$connection=new mysqli($server,$username,$password,$db);

$id = $_POST['id'];
 $del="DELETE FROM `data_3` WHERE  id='$id'";

$run_=mysqli_query($connection,$del);
echo"<script>
window.location.href='delete_1.php';
alert('your record is delete')
</script>";


?>