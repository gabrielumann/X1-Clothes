<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/web/assets/css/login.css">
<?php $this->end(); ?>
<?php $this->start("specific-script")?>
<script src="<?=url("themes/web/assets/js/scripts-login.js")?>" type="module" async></script>
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
                            <input type="text" name="email" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Senha" required>
                            <button class="btn">Entrar</button>
                            <a href="">Esqueceu a senha?</a>

                        </form>
                        <form id="regForm">
                            <input type="text" name="first_name" placeholder="Primeiro nome" required>
                            <input type="text" name="last_name" placeholder="Ultimo nome" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="cpf" maxlength="11" placeholder="CPF" oninput="this.value=this.value.replace(/[^0-9.]/g,'')" required>
                            <input type="password" id="password" name="password" placeholder="Senha" required>
                            <input type="password" id="passwordConfirmed" name="passwordConfirmed" placeholder="Confirmar senha" required>
                            <button class="btn">Registrar</button>
                        </form>
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


