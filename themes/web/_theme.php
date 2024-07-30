<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>X1 Clothes </title>
        <link rel="stylesheet" href="<?= url("/assets/css/styles.css"); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="assets/js/scripts.js"></script>
        <?php if ($this->section("specific-style")): ?>
            <?= $this->section("specific-style"); ?>
        <?php endif; ?>
    </head>
    <body>
        <div class="header">
            <div class="container1">
                <div class="navbar">
                    <div class="logo">
                        <a href="<?= url(); ?>"><img src="assets/images/logox1.png">
                        </a>
                    </div>
                    <nav>
                        <ul id="menuItems">
                            <li><p><a href="<?= url(); ?>">Home</a></p></li>
                            <li><p><a href="<?= url("produtos"); ?>">Produtos</a></p></li>
                            <li><p><a href="<?= url("sobre"); ?>">Sobre</a></p></li>
                            <li><p><a href="<?= url("faqs"); ?>">Ajuda</a></p></li>
                            <li><p><a href="<?= url("entrar"); ?>">Login</a></p></li>
                        </ul>
                    </nav>
                    <a href="<?= url("carrinho"); ?>"><img src="assets/images/cart.png" width="30px" height="30px">
                    </a> 
                    <img src="assets/images/menu.png" class="menu-icon" onclick="menutoggle()">
                </div>
            </div>
        </div>




    <div id="content">
        <!-- Your content goes here -->
        <?php
            echo $this->section("content");
        ?>
    </div>



            <!--    brands     -->
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <a href="https://int.bape.com/">
                            <img src="assets/images/logo-bape.png">
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="https://www.adidas.com.br/">
                            <img src="assets/images/logo-adidas.png">
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="https://www.crtz.xyz/password">
                            <img src="assets/images/logo-corteiz.png  ">
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="https://uk.trapstarlondon.com/">
                            <img src="assets/images/logo-trapstar.png">
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="https://www.nike.com.br/">
                            <img src="assets/images/logo-nike.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>



<!--             footer                -->

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Baixe o nosso App</h3>
                        <p>
                            Disponível em sistemas Android.
                        </p>
                        <div class="app-logo">
                            <img src="assets/images/play-store.png">
                            <img src="assets/images/app-store.png">
                        </div>
                    </div>
                    <div class="footer-col-2">
                        <div class="logo">
                            <a href="<?= url(); ?>">X1 Clothes</span>
                            </a>
                            </div>
                        <p>
                            Nosso Propósito é fazer todos poderem se vestir
                            do jeito que se sentirem bem, por um preço acessível.
                        </p>
                    </div>
                    <div class="footer-col-3">
                        <h3>Mapa Site</h3>
                        <ul>
                            <li><a href="<?= url(); ?>">Home</a></li>
                            <li><a href="<?= url("produtos"); ?>">Produtos</a></li>
                            <li><a href="<?= url("sobre"); ?>">Sobre</a></li>
                            <li><a href="<?= url("contato"); ?>">Contato</a></li>
                        </ul>
                    </div>
                    <div class="footer-col-4">
                        <h3>Contato</h3>
                        <ul>
                            <li>(51)985412451</li>
                            <li>x1clothes@suporte.com</li>
                            <li>R. Gen. Balbão, 81 - Centro, <br> Charqueadas - RS, 96745-000</li> 
                        </ul>
                    </div>
                </div>
            
            </div>
        </div>


<!--                js for toggle menu          temp      -->
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