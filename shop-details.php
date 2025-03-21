

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
<?php include("header.php")?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        <?php while($row=mysqli_fetch_assoc($run)){
?>
                                 <li><a href="blog.php"><?php echo $row['category_2']?></a></li>
 

                          <?php }?>
                        
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                
    <?php  
    $id=$_GET['id'];
$sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE id='$id'";
$runn = mysqli_query($con, $sqll);
                                         
                                        
                                        while ($roww=mysqli_fetch_assoc($runn)) {
                                        
                                        ?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/<?php echo $roww['pic']?>" alt="">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $roww['name']?></h3>
                        <div class="product__details__rating">
                            <?php 
                            $rate=$roww['rating'];
                            for ($i=0; $i <$rate; $i++) { 
                                
                            ?>
                            <i class="fa fa-star"></i>
                            <?php }?>
                            <?php 
                            $rate=$roww['rating'];
                            $minus=5-$rate;
                            for ($i=0; $i <$minus; $i++) { 
                                
                            ?>
                            <i class="fa fa-star-o"></i>
                            <?php }?>
                            <span>(<?php echo $roww['rating']?> Star)</span>
                        </div>
                        <div class="product__details__price">Rs <?php echo $roww['price']?></div>
                        <p><?php echo $roww['detail']?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="shoping_insert_1.php?id=<?php echo $roww['id']?>" class="primary-btn" name="cart">ADD TO CART</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>

                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p><?php echo $roww['description']?></p>
                                </div>
                            </div>
                           </div>
                    </div>
                
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
<!-- Related Product Section End -->

    <!-- Footer Section Begin -->
  <?php include("footer.php")?>