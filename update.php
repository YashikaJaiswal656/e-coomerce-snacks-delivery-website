<?php

$username="root";
$password="";
$server="localhost";
$db="yashika";

$connection=new mysqli($server,$username,$password,$db);
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
   $id=$_GET['id'];
    $sql="UPDATE `data_3` SET `name`='$name',`detail`='$detail',`description`='$description',`slug`='$slug',`slug_2`='$slug_2',`pic`='$images',`price`='$price',`rating`='$rating' WHERE id='$id'";
    if($run=mysqli_query($connection,$sql)){
       echo'<script>
    alert("your product has updated succesfully");
    window.location.href="home_1.php"
       </script>';
        
    }
    else{
        echo "eer";
    }
    
 }
 


?>