<?php
    echo $this->layout("_theme");       
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="assets/css/products-details.css">
</head>
<body>


    <!--  single product details  -->

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="assets/images/gallery-1.jpg" width="100%" id="ProductImg">
                
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="assets/images/gallery-1.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/images/gallery-2.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/images/gallery-3.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/images/gallery-4.jpg" width="100%" class="small-img">
                    </div>
                </div>
                
            </div>
            <div class="col-2">
                <p>Home / T-Shirt</p>
                <h1>BEL Printed T-Shirt by BEL</h1>
                <h4>$50.00</h4>
                <select>
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>Large</option>
                    <option>Medium</option>
                    <option>Small</option>
                </select>

                <input type="number" value="1">
                <a href="" class="btn">Add To Cart</a>

                <h3>Product Details  <i class="fa fa-indent"></i></h3>
                <br>
                <p>
                    Give your summer wardrobe a style upgrade with the
                    BEL Men's Active T-Shirt. Team it with a pair of shorts
                    for your morning workout or a denims for evening out with the guys.
                </p>
            </div>
        </div>
    </div>

    <!--  title  -->
<div class="row">
    <h2>Related Products</h2>
    <p>View More</p>
</div>


    <!--  products   -->


<div class="small-container">
    
    <div class="row">
        <div class="col-4">
            <img src="assets/images/product-9.jpg">
            <h4>BEL Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="assets/images/product-10.jpg">
            <h4>BEL Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="assets/images/product-11.jpg">
            <h4>BEL Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div>
            <p>$50.00</p>
        </div>
        <div class="col-4">
            <img src="assets/images/product-12.jpg">
            <h4>BEL Printed T-Shirt</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>$50.00</p>
        </div>
    </div>



</div>

</body>
</html>