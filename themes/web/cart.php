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
            <th>Produtos</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="assets/images/buy-1.jpg">
                    <div>
                        <p>exemplo</p>
                        <small>Preço: $50.00</small>
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
                    <img src="assets/images/buy-2.jpg">
                    <div>
                        <p>exemplo</p>
                        <small>Preço: $70.00</small>
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
                    <img src="assets/images/buy-3.jpg">
                    <div>
                        <p>exemplo</p>
                        <small>Preço: $75.00</small>
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
                <td>Taxa</td>
                <td>$30.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>$230.00</td>
            </tr>
        </table>
    </div>
    <span id="btnFinish">
            <a href="<?= url(); ?>">Terminar</a>
        </span>


</div>


</body>
</html>