<?php

$servername="localhost";
$username="root";
$password="";
$dbname="yashika";
$con=new mysqli($servername,$username,$password,$dbname);
$sql='SELECT `category`, `slug`, `category_2`, `slug_2` FROM `cat_2` WHERE 1
';

$run = mysqli_query($con, $sql);


?>
<?php include("header_2.php")?>
  <!-- Hero Section End -->
  <?php 
$id=$_POST['id'];
$sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE id='$id'";
$runn = mysqli_query($con, $sqll);


?>
<?php 
while ($roww=mysqli_fetch_assoc($runn)) {
    $real_slug=$roww['slug'];
    $real_slug_2=$roww['slug_2'];

?>
            <div class="col-lg-6 border rounded-2 p-3">
                <h2>Product Insert</h2>
                <form action="update.php?id=<?php echo $roww['id']?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $roww['name']?>"  >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Detail</label>
                        <input type="text" class="form-control"   name="detail" value="<?php echo $roww['detail']?>"   >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Long Discription</label>
                        <textarea name="Ldescription" type="text" class="form-control" id="" ><?php echo $roww['description']?>"  </textarea>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" value="<?php echo $roww['pic']?>"name="images" class="form-control" id="" >
                        
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="number" class="form-control" value="<?php echo $roww['price']?>"   name="price" >
                    </div>
                    <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="slug" class="form-select" >
        <option value=""> Select Cat</option>
        <?php
        $sql='SELECT `category`, `slug`, `category_2`, `slug_2` FROM `cat_2` WHERE 1
        ';
        
        $run = mysqli_query($con, $sql);
        
        while ($row = mysqli_fetch_assoc($run)) { ?>
            <option value="<?php echo ($row['slug']); ?>"
            <?php echo ($row['slug'] == $real_slug) ? 'selected' : ''; ?>>
            <?php echo $row['category_2']; ?>
        
        </option>
        <?php } ?>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Product Type</label>
    <select name="slug_2" class="form-select" >
        <option value=""> Select Type</option>
        <?php
$sql='SELECT `category`, `slug`, `category_2`, `slug_2` FROM `cat_2` WHERE 1
';

$run = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($run)) { ?>
            <option value="<?php echo ($row['slug_2']); ?>"
            <?php echo ($row['slug_2'] == $real_slug_2) ? 'selected' : ''; ?>>
            <?php echo $row['category_2']; ?>
        </option>
        <?php } ?>
    </select>
</div>
  <div class="mb-3">
                       
                       <label class="form-label"> Rating</label>
                       <select name="rating" class="form-control" id="">
                        <option value=""> Select Rating</option>
                       <option value="1" class="form-control"<?php echo ($roww['rating']==1) ?'selected':'';?>>1 Star</option>
                       <option value="2" class="form-control"<?php echo ($roww['rating']==2)?'selected':'';?>> 2 Star</option>
                       <option value="3" class="form-control"<?php echo ($roww['rating']==3)?'selected':'';?>>3 Star</option>
                       <option value="4" class="form-control"<?php echo ($roww['rating']==4)?'selected':'';?>> 4 Star</option>
                       <option value="5" class="form-control"<?php echo ($roww['rating']==5)?'selected':'';?>>5 Star</option>


                       </select>
                    
                    </div>
                    
                 
                    <input type="submit" value="Submit" class="btn btn-primary" name="button">
                </form>
            </div>
<?php }?>
            
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/tuqe4srxh8srt24ygj7euk068w11r8esg4dso4uczoqs43tb/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea[name="Ldescription"]',
    plugins: 'lists link image table code',
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
    branding:false,
    forced_root_block: false 
  });
</script>

<?php include("footer_2.php")?>