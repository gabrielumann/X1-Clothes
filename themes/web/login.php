<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/web/assets/css/login.css">
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
                            <hr id="Indicator">

                        </div>

                        <form id="LoginForm">
                            <input type="text" placeholder="Email">
                            <input type="password" placeholder="Senha">
                            <button class="btn">Entrar</button>
                            <a href="">Esqueceu a senha?</a>

                        </form>
                        <form id="RegForm">
                            <input type="text" placeholder="Usuário">
                            <input type="email" placeholder="Email">
                            <input type="text" placeholder="CPF">
                            <input type="password" placeholder="Senha">
                            <input type="password" placeholder="Confirmar senha">
                            <button class="btn">Registrar</button>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>




<!--   js for toggle Form    -->

<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    function changeLogin(){
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(0px)";
    }

    function changeRegister(){
        RegForm.style.transform = "translateX(-300px)";
        LoginForm.style.transform = "translateX(-300px)";
        Indicator.style.transform = "translateX(100px)";
    }

</script>

