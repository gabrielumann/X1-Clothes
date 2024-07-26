<?php
    echo $this->layout("_theme");       
?>


<!DOCTYPE html>
<html lang="pt-br">
    <body>
        
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
                        <img  src="assets/images/icon1.png" >
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
                            <img src="assets/images/category-1.jpg">
                            <h2> 
                            Calças 
                        </a> 
                        </h2>
            
                    </div>
                    <div class="col-3">
                        <a href="<?= url("produtos"); ?>">
                            <img src="assets/images/category-2.jpg">
                            <h2> 
                            Tênis   
                        </a> 
                        </h2>
            
                    </div>
                    <div class="col-3">
                        <a href="<?= url("produtos"); ?>">
                            <img src="assets/images/category-3.jpg">
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
                        <img src="assets/images/bapesta.png" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>Exclusivamente na <span>X1 Clothes</span></p>
                        <h1>BapeSta Low Black</h1>
                        <small>
                            Este tênis impressionante apresenta uma silhueta clássica e atemporal,
                            com detalhes minuciosamente elaborados para criar um visual único.
                            A parte superior é confeccionada com materiais premium, garantindo durabilidade e conforto incomparáveis.
                        </small> <br>
                        <a href="<?= url("detalhes"); ?>" class="btn">Buy Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>

        <!--      featured products    -->
        <div class="content">
            <div class="small-container">
                <h2 class="title">Produtos Mais Vendidos do Mês</h2>
                <div class="row">
                    <div class="col-4">
                    <a href="<?= url("detalhes"); ?>"> 
                        <img class="productsImg" src="assets/images/product-1.png">
                    </a>
                    <a href="<?= url("detalhes"); ?>">
                        <h4>CORTEIZ - Jaqueta Jeans Trucker C-Starz "Azul"</h4>
                    </a>
            
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>R$350,00</p>
                    </div>
            
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>"> 
                            <img class="productsImg" src="assets/images/product-2.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>Camiseta Golf Wang 3D Multi Color - Black</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>R$150.00</p>
                    </div>
            
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-3.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>Yeezy 350 V2 MX Dark Salt</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <p>R$900.00</p>
                    </div>
            
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-4.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>Trapstar Star All Over Moletom - Black</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>$450.00</p>
                    </div>
                </div>

                <h2 class="title">Produtos</h2>
                <div class="row">
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-5.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>TÊNIS ADIDAS YEEZY BOOST 350 V2 " BONE " BRANCO</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>R$1150.00</p>
                    </div>
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-6.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>CORTEIZ - Boné Trucker 5 Starz Alcatraz "Preto"</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>R$250.00</p>
                    </div>
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-7.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>CORTEIZ - Jaqueta Goat Varsity "Marinho/Branco"</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <p>R$550.00</p>
                    </div>
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-8.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>Calça Cargo Minus Two Preto/Vermelho</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>R$199.99</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-9.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>HYPERDRIVE PUFFER - BLACK</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>$780.00</p>
                    </div>
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-10.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>KENTUCKY WILDCATS SPORTCAP</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>R$250.00</p>
                    </div>
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-11.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4>CAMISA SPRAY CITY PARIS</h4>
                        </a>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <p>R$200.00</p>
                    </div>
                    <div class="col-4">
                        <a href="<?= url("detalhes"); ?>">
                            <img class="productsImg" src="assets/images/product-12.png">
                        </a>
                        
                        <a href="<?= url("detalhes"); ?>">
                            <h4> Jaqueta de Corrida Palm Angels</h4>
                        </a>
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
                        <img src="assets/images/user-1.png">
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
                        <img src="assets/images/user-2.png">
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
                        <img src="assets/images/user-3.png">
                        <h3>Ana Mobs</h3>

                    </div>
                </div>
            </div>
        </div>



    </body>
</html>