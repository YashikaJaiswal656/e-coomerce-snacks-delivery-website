<?php
$username = "root";
$servername = "localhost";
$password = "";
$dbname = "yashika";
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE 1";
$run = mysqli_query($con, $sql);

include("header_2.php");
?>

<div class="col-lg-10">
    <div class="row">
        <h2 class="text-center mb-4">Our Products</h2> 

        <?php while ($row = mysqli_fetch_assoc($run)) { ?>
            <div class="col-lg-4 col-md-6 mt-5">
                <article class="post-card shadow-lg rounded p-3">
                    <div class="post-img">
                        <img src="img/<?php echo htmlspecialchars($row['pic']); ?>" style="height:250px; width:300px;" alt="Product Image" class="img-fluid rounded">
                    </div>

                    <div class="post-content mt-2">
                        <h2 class="post-title fw-bold text-danger"><?php echo htmlspecialchars($row['name']); ?></h2>

                        <div class="d-flex">
                            <div class="h5 bold">Price:</div>
                            <p class="text-success post-price fw-bold"><?php echo htmlspecialchars($row['price']); ?> <span class="currency">Rs</span></p>
                        </div>
                        <div class="category-tag d-flex">
                            <h5 class="bold">Category:</h5>
                            <p><?php echo htmlspecialchars($row['slug']); ?></p>
                        </div>
                        

                        <div class="text-center d-flex justify-content-around">
                            <form action="del.php" method="post" >
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <form action="edit.php" method="post" >
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        <?php } ?>
    </div>   
</div>

<?php include("footer_2.php"); ?>
