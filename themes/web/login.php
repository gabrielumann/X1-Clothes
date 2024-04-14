<?php
    echo $this->layout("_theme");       
?>

<!DOCTYPE html>
<html lang="pt-br">
<body>

<!-- container form-->
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img  src="../images/centralcee.png" >
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Entrar</span>
                            <span onclick="register()">Registrar</span>
                            <hr id="Indicator">

                        </div>

                        <form id="LoginForm">
                            <input type="text" placeholder="Usuário">
                            <input type="password" placeholder="Senha">
                            <button type="submit" class="btn">Entrar</button>
                            <a href="">Esqueceu a senha?</a>

                        </form>
                        <form id="RegForm">
                            <input type="text" placeholder="Usuário">
                            <input type="email" placeholder="Email">
                            <input type="password" placeholder="Senha">
                            <button type="submit" class="btn">Registrar</button>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>



<!--    brands     -->
<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="../images/logo-godrej.png">
            </div>
            <div class="col-5">
                <img src="../images/logo-oppo.png">
            </div>
            <div class="col-5">
                <img src="../images/logo-coca-cola.png">
            </div>
            <div class="col-5">
                <img src="../images/logo-paypal.png">
            </div>
            <div class="col-5">
                <img src="../images/logo-philips.png">
            </div>
        </div>
    </div>
</div>


<!--   js for toggle Form    -->

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function login(){
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(0px)";
    }

    function register(){
        RegForm.style.transform = "translateX(-300px)";
        LoginForm.style.transform = "translateX(-300px)";
        Indicator.style.transform = "translateX(100px)";
    }

</script>


</body>
</html>
