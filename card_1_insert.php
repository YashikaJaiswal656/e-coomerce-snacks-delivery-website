<?php
$username="root";
$servername="localhost";
$password="";
$dbname="yashika";
$con=new mysqli($servername,$username,$password,$dbname);

    
if(htmlspecialchars(isset($_POST["button"]))) {
   $name=htmlspecialchars($_POST["name"]);
   $detail=htmlspecialchars($_POST["detail"]);
   $price=htmlspecialchars($_POST["price"]);
   $slug=htmlspecialchars($_POST["slug"]);
   $slug_2=htmlspecialchars($_POST["slug_2"]);
   
   $rating=$_POST["rating"];
   $description= $_POST["Ldescription"];
   $images=$_FILES['images']['name'];
   $tmp_images=$_FILES['images']['tmp_name'];
  
   $sql="INSERT INTO `data_3`( `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating`) VALUES ('$name','$detail','$description','$slug','$slug_2','$images','$price','$rating')";
   if($run=mysqli_query($con,$sql)){
      echo'<script>
   alert("your product has upoload succesfully");
   window.location.href="home_1.php"
      </script>';
       
   }
   
}




?>