<?php

$servername="localhost";
$username="root";
$password="";
$dbname="yashika";
$con=new mysqli($servername,$username,$password,$dbname);
$sql='SELECT `category`, `slug`, `category_2`, `slug_2` FROM `cat_2` WHERE 1
';

$run = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($run)

?>
<?php 

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
 

$email = $_SESSION['email'];





$uan="SELECT `id`, `uname`, `pname`, `pic`, `price` FROM `payment` WHERE uname='$email'";
$rush=mysqli_query($con,$uan);

?>
<style>
    /* Container for the quantity input */
    .quantity-container {
        display: inline-flex;
        align-items: center;
        border: 1px solid #ced4da;
        /* Border around the whole component */
        border-radius: .25rem;
        /* Rounded corners */
        font-size: 1rem;
        /* Default font size */
        overflow: hidden;
        /* Hide overflow (in case of a border) */
    }

    /* Styling for the buttons */
    .quantity-btn {
        background-color: #fff;
        border: 1px solid #ced4da;
        /* Border similar to Bootstrap */
        padding: .375rem .75rem;
        /* Padding for the buttons */
        font-size: 1.25rem;
        /* Larger font for the button */
        cursor: pointer;
        /* Pointer cursor on hover */
        transition: background-color 0.3s;
        /* Smooth background color transition */
    }

    /* Hover effect for the buttons */
    .quantity-btn:hover {
        background-color: #e2e6ea;
        /* Light grey on hover */
    }

    /* Focused button styling (similar to Bootstrap) */
    .quantity-btn:focus {
        outline: none;
        background-color: #e2e6ea;
        border-color: #a6a6a6;
    }

    /* Style for the input field */
    .quantity-input {
        width: 60px;
        height: 100%;
        border: 1px solid #ced4da;
        text-align: center;
        font-size: 1.25rem;
        padding: .375rem 0;
        /* Vertical padding for better alignment */
        outline: none;
        background-color: #fff;
    }

    /* Remove input's outline on focus to match the button's focus style */
    .quantity-input:focus {
        border-color: #a6a6a6;
        background-color: #fff;
    }
</style>

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
                        <li><a href="blog.php">
                                <?php echo $row['category_2']?>
                            </a></li>


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
                            <h5>+91 9899869172</h5>
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
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php     
                                        while ($rim=mysqli_fetch_assoc($rush)) {
                                        
                                        ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/<?php echo $rim['pic']?>" alt="" style="height:160px; width:200px;">
                                    <h5 >
                                        <?php echo $rim['pname']?>
                                    </h5>
                                </td>
                                <td class="shoping__cart__price ">
                                    <div class="range d-flex">
                                        <div>Rs</div>
                                        <div class="pre">
                                            <?php echo $rim['price']?>
                                        </div>
                                    </div>

                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="quantity-container">
                                            <button class="quantity-btn decrease">-</button>
                                            <input type="number" class="quantity-input" value="1" min="1" />
                                            <button class="quantity-btn increase">+</button>
                                        </div>


                                    </div>
                                </td>
                                <td class="shoping__cart__total res" >

                                    Rs
                                    <?php echo $rim['price']?>
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close"></span>
                                </td>
                            </tr>
<?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="shop-grid.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
              
                    <h5>Cart Total</h5>

                    <ul>
                       
                    
                    <li>Subtotal <span class="subtotal">Rs
                                
                            </span></li>
                        
                        <li>GST <span class="total" > Rs
                                
                            </span></li>
                        <li>Total<span class="payment" >Rs
                                
                            </span></li>
                        
                    </ul><form action="checkout.php" method="POST">
    <input type="hidden" name="pname" ><input type="hidden" name="subtotal" class="res" >
<input type="hidden" name="gst" class="total">
<input type="hidden" name="total" class="payment" >

    <button type="submit" class="primary-btn">PROCEED TO CHECKOUT</button>
</form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
<script>
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    let subtotal = 0;
document.querySelectorAll(".shoping__cart__table tbody tr").forEach((row) => {
    let price = parseInt(row.querySelector(".pre").textContent);
    let quantity = parseInt(row.querySelector(".quantity-input").value);
    subtotal += price * quantity;
});
document.querySelector(".subtotal").textContent = "Rs" + subtotal;
let gst = subtotal * 2 / 100;
document.querySelector(".total").textContent = "Rs" + gst;

let tamount = subtotal + gst;
document.querySelector(".payment").textContent = "Rs" + tamount;

document.querySelector("input[name='subtotal']").value = subtotal;
document.querySelector("input[name='gst']").value = gst;
document.querySelector("input[name='total']").value = tamount;



});

document.querySelectorAll(".shoping__cart__table tbody tr").forEach((row) => {
    let dec = row.querySelector(".decrease");
    let inc = row.querySelector(".increase");
    let main = row.querySelector(".quantity-input");
    dec.addEventListener('click', function () {
        let cval = parseInt(main.value);
        if (cval > 1) {
            const sigma = cval - 1
            main.value = sigma;
            update();

        }
    })
    inc.addEventListener('click', function () {
        let cval = parseInt(main.value);
        const sigma = cval + 1
        main.value = sigma;
        update();
    });
    function update() {

        let val = row.querySelector(".pre");
        let cval = parseInt(main.value);
        const sigma = cval + 0
        let kiwi = val.textContent;
        let t = kiwi * sigma;

        let total = row.querySelector(".res").textContent = "Rs" + t;
        let subtotal = 0;
        document.querySelectorAll(".shoping__cart__table tbody tr").forEach((row) => {
            let price = parseInt(row.querySelector(".pre").textContent);
            let quantity = parseInt(row.querySelector(".quantity-input").value);
            subtotal += price * quantity;
        });
        document.querySelector(".subtotal").textContent = "Rs" + subtotal;
        let gst = subtotal * 2 / 100;
        document.querySelector(".total").textContent = "Rs" + gst;

     
        let tamount = subtotal + gst;
        document.querySelector(".payment").textContent = "Rs" + tamount;
        document.querySelector("input[name='subtotal']").value = subtotal;
document.querySelector("input[name='gst']").value = gst;
document.querySelector("input[name='total']").value = tamount;

        
    }
    


});
</script>

<?php include("footer.php")?>