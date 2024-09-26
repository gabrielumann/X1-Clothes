<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/web/assets/css/login.css">
<?php $this->end(); ?>
<?php $this->start("specific-script")?>
<script src="themes/web/assets/js/scripts-register.js" async></script>
<script src="themes/web/assets/js/scripts-login.js" async></script>
<?php $this->end(); ?>

        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img  src="themes/shared/images/icon/icon3.png" >
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="changeLogin()">Entrar</span>
                            <span onclick="changeRegister()">Registrar</span>
                            <hr id="indicator">

                        </div>

                        <form id="loginForm">
                            <input type="text" placeholder="Email">
                            <input type="password" placeholder="Senha">
                            <button class="btn">Entrar</button>
                            <a href="">Esqueceu a senha?</a>

                        </form>
                        <form id="regForm">
                            <input type="text" name="first_name" placeholder="Primeiro nome">
                            <input type="text" name="last_name" placeholder="Ultimo nome">
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="cpf" placeholder="CPF">
                            <input type="password" name="password" placeholder="Senha">
                            <input type="password" name="passwordConfirmed" placeholder="Confirmar senha">
                            <button class="btn">Registrar</button>

                    </div>

                </div>

            </div>
        </div>





<!--   js for toggle Form    -->

<script>
    var loginForm = document.getElementById("loginForm");
    var regForm = document.getElementById("regForm");
    var indicator = document.getElementById("indicator");

    function changeLogin(){
        regForm.style.transform = "translateX(0px)";
        loginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(0px)";
    }

    function changeRegister(){
        regForm.style.transform = "translateX(-300px)";
        loginForm.style.transform = "translateX(-300px)";
        indicator.style.transform = "translateX(100px)";
    }

</script>


