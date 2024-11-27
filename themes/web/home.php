<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-script")?>
<script src="<?=url("themes/web/assets/js/home.js")?>" type="module" async></script>
<?php $this->end(); ?>
        <!--     Start            -->
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <h1>A Melhor Loja<br> Do Brasil!</h1>
                        <p>
                            O sucesso não é uma questão de grandeza. É uma questão de consistência. 
                            <br> O consistente trabalho duro obtém o sucesso. A grandeza chegará para todos.
                        </p>
                        <a href="<?= url("produtos"); ?>" class="btn">Veja Agora &#8594;</a>
                    </div>
                    <div class="col-2">
                        <img  src="<?= url("themes/shared/images/icon/icon1.png"); ?>">
                    </div>
                </div>
            </div>

        <!--         featured categories        -->

        <div class="categories">
            <div class="small-container">
                <h2 class="title">Categorias</h2>
                <div class="row">
                    <div class="col-3">
                        <a href="<?= url("produtos"); ?>">
                            <img src="<?= url("themes/shared/images/interface/category-1.jpg"); ?>">
                            <h2> 
                            Calças 
                        </a> 
                        </h2>
            
                    </div>
                    <div class="col-3">
                        <a href="<?= url("produtos"); ?>">
                            <img src="<?= url("themes/shared/images/interface/category-2.jpg"); ?>">
                            <h2> 
                            Tênis   
                        </a> 
                        </h2>
            
                    </div>
                    <div class="col-3">
                        <a href="<?= url("produtos"); ?>">
                            <img src="<?= url("themes/shared/images/interface/category-3.jpg"); ?>">
<!--                            aq vai ser passado a category.image-->
                            <h2> 
                            Casacos   
                        </a> 
                        </h2>
            
                    </div>
                </div>
            </div>
        </div>

        <!--     offer     -->
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="<?= url("themes/shared/images/interface/bapesta.png"); ?>" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusivamente na <span>X1 Clothes</span></p>
                        <h1>BapeSta Low Black</h1>
                        <small>
                            Este tênis impressionante apresenta uma silhueta clássica e atemporal,
                            com detalhes minuciosamente elaborados para criar um visual único.
                            A parte superior é confeccionada com materiais premium, garantindo durabilidade e conforto incomparáveis.
                        </small> <br>
                        <a href="<?= url("detalhes"); ?>" class="btn">Compre Agora</a>
                    </div>
                </div>
            </div>
        </div>

        <!--      featured products    -->
        <div class="content">
            <h2 class="title">Produtos Mais Vendidos do Mês</h2>
            <div class="small-container" id="container-product">
                <div class="row" id="row-seller">
<!--                    <div class="col-4">-->
<!--                    <a href="--><?php //= url("detalhes"); ?><!--">-->
<!--                        <img class="productsImg" src="assets/images/product-1.png">-->
<!--                    </a>-->
<!--                    <a href="--><?php //= url("detalhes"); ?><!--">-->
<!--                        <h4>CORTEIZ - Jaqueta Jeans Trucker C-Starz "Azul"</h4>-->
<!--                    </a>-->
<!---->
<!--                        <div class="rating">-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star"></i>-->
<!--                            <i class="fa fa-star-o"></i>-->
<!--                        </div>-->
<!--                        <p>R$350,00</p>-->
<!--                    </div>-->
                </div>

                <h2 class="title">Produtos</h2>


            </div>
        </div>

        <!--------      testimonial       ------------- -->
        <div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>
                            Loja com bastante variedades de roupas, roupas que normalmente estão na moda, 
                            melhor loja pra procurar roupas chiques e que estão em alta!
                        
                        </p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="themes/shared/images/interface/user-1.png">
<!--                        aq vai a user.img-->
                        <h3>Sean Parker</h3>

                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>
                            Fui muito bem atendido e em especial o atendimento do Gabriel Umann
                            que foi super atencioso e empenhado em ajudar a encontrar o produto que eu desejava e inclusive me ajudou a concluir a compra online.
                        
                        </p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="themes/shared/images/interface/user-2.png">
                        <h3>Max Retch</h3>

                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>
                            A loja está cada vez melhor , muito coisa legal, casacos, tênis,  
                            calças e camisetas lindíssimas pra galera toda,  
                            moda acessível e com funcionárias legais e atenciosos.
                        
                        </p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="themes/shared/images/interface/user-3.png">
                        <h3>Ana Mobs</h3>

                    </div>
                </div>
            </div>
        </div>