<?php
    echo $this->layout("_theme");       
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>

    <!--  cart items details  -->
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Products</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="/images/buy-1.jpg">
                    <div>
                        <p>BEL Printed T-shirt</p>
                        <small>Price: $50.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$50.00</td>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="/images/buy-2.jpg">
                    <div>
                        <p>BEL Printed T-shirt</p>
                        <small>Price: $70.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$70.00</td>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="/images/buy-3.jpg">
                    <div>
                        <p>BEL Printed T-shirt</p>
                        <small>Price: $75.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>$75.00</td>
        </tr>
</table>

<div class="total-price">
    <table>
        <tr>
            <td>Subtotal</td>
            <td>$200.00</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td>$30.00</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>$230.00</td>
        </tr>
    </table>
</div>



</div>
<!--    footer     -->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>
                    Download App for Android and ios mobile phone.
                </p>
                <div class="app-logo">
                    <img src="/images/play-store.png">
                    <img src="/images/app-store.png">
                </div>
            </div>
            <div class="footer-col-2">
                <div class="logo">
                    <a href="../index.html"><span id="bel">BEL </span><span id="lgw">STORE</span>
                    </a>
                    </div>
                <p>
                    Our Purpose Is To Sustainably Make the Pleasure
                    and Benefits of Sports Accessible to the Many.
                </p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li> 
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li> 
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
      
    </div>
</div>


<!--      js for toggle menu      -->
<script>
    var MenuItems = document.getElementById("menuItems");

    MenuItems.style.maxHeight = "0px";

    function  menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px"
        }
        else
        {
            MenuItems.style.maxHeight = "0px"
        }
}
</script>


</body>
</html>