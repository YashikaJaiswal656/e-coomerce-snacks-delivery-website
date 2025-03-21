
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
<style>
    a:hover{
        color:black;
    }
    a{
        color:white;
    }
</style>    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
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
                                <h5>9899869172</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<?php 

$sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE 1";
$runn = mysqli_query($con, $sqll);


?>
    <!-- Categories Section Begin -->
    <section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php while ($roww = mysqli_fetch_assoc($runn)) { ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/<?php echo $roww['pic']; ?>" style="height:169px; width:274px;">
                            <h5><a href="blog-details.php?id=<?php echo $roww['id']?>"><?php echo $roww['name']; ?></a></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
    <!-- Categories Section End -->
<style>
    .text-black{
        color:black !important;
    }
</style>
    <section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2>Featured Product</h2>
                </div>
                <div class="text-center">
                  <div class="row">
                    
                        
                    <?php
                        $sql = 'SELECT `category`, `slug`, `category_2`, `slug_2` FROM `cat_2` WHERE 1';
                        $run = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($run)) {
                        ?>
                        <div class="col-lg-2  d-flex justify-content-center shadow m-2 " style="background-color:#7fad39;color:white !important; ">
                            <a class="d-block p-3   text-center text-decoration-none   " href="index.php?slug_2=<?php echo $row['slug_2']?>"><?php echo($row['category_2'])?></a>
                            </div>
                        <?php } ?>
                    </div>
                  
                    
                </div>
            </div>
        </div>

    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-10">
    <div class="row ">
  
    
    <?php 
    $slip = isset($_GET['slug_2']) ? $_GET['slug_2'] : '';

    // Fetch products based on selected category
    if ($slip) {
        $sqll = "SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE slug_2='$slip'";
    } else {
        // Fetch all products if no category is selected
        $sqll = "SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3`";
    }
$runn = mysqli_query($con, $sqll);
    while ($roww = mysqli_fetch_assoc($runn)) { ?>
       
       <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/<?php echo $roww['pic']?>" style="height:169px; width:274px;">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="shop-details.php?id=<?php echo $roww['id']?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?php echo $roww['slug_2']?></span>
                                            <h5><a href="blog-details.php?id=<?php echo $roww['id']?>"><?php echo $roww['name']?></a></h5>
                                            <div class="product__item__price">Rs<?php echo $roww['price']?></div>
                                        </div>
                                    </div>
                                </div>
                               
        <?php } ?>
        </div>   
        </div>
    </div>
    </div>
</div>

    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                
    <?php 
    
    $sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE slug='top-review'";
    $runn = mysqli_query($con, $sqll);
        while ($roww = mysqli_fetch_assoc($runn)) { ?>
                                <a href="blog.php" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/<?php echo $roww['pic']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $roww['name']?></h6>
                                        <span><?php echo $roww['price']?></span>
                                    </div>
                                </a>
                               
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <a href="blog.php" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/<?php echo $roww['pic']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $roww['name']?></h6>
                                        <span><?php echo $roww['price']?></span>
                                    </div>
                                </a>
                               <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                             
    <?php 
    
    $sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE slug='top-rated'";
    $runn = mysqli_query($con, $sqll);
        while ($roww = mysqli_fetch_assoc($runn)) { ?>
                                <a href="blog.php" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/<?php echo $roww['pic']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $roww['name']?></h6>
                                        <span><?php echo $roww['price']?></span>
                                    </div>
                                </a>
                                
                               
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <a href="blog.php" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/<?php echo $roww['pic']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $roww['name']?></h6>
                                        <span><?php echo $roww['price']?></span>
                                    </div>
                                </a>
                               <?php }?>                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                               
    <?php 
    
    $sqll="SELECT `id`, `name`, `detail`, `description`, `slug`, `slug_2`, `pic`, `price`, `rating` FROM `data_3` WHERE slug='top-selling'";
    $runn = mysqli_query($con, $sqll);
        while ($roww = mysqli_fetch_assoc($runn)) { ?>
                                <a href="blog.php" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/<?php echo $roww['pic']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $roww['name']?></h6>
                                        <span><?php echo $roww['price']?></span>
                                    </div>
                                </a>
                               
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <a href="blog.php" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/<?php echo $roww['pic']?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $roww['name']?></h6>
                                        <span><?php echo $roww['price']?></span>
                                    </div>
                                </a>
                               <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
   
   <?php include("footer.php")?>