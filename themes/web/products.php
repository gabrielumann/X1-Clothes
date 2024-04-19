<?php
    echo $this->layout("_theme");       
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="assets/css/products.css">
</head>
<body>


    <div class="small-container">
    <h2>Todos os Produtos</h2>
        <div class="row row-2">
            <select class="select">
                <option>Todos os Produtos</option>
                <option>Selecionar por preço</option>
                <option>Selecionar por popularidade</option>
                <option>Selecionar por avaliações</option>
                <option>Selecionar por marcas</option>
            </select>
            <form class="search-container">
                <input type="text" id="search-bar" placeholder="Busca">
                <a href="#"><img class="search-icon" src="assets/images/iconSearch.png"></a>
            </form>
        </div>

    <div class="row">
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-1.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-2.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
            </a>
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
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-3.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
            </a>
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
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-4.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
    
    <div class="row">
    <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-5.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-6.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-7.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-8.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
    <div class="row">
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-9.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-10.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-11.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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
        <div class="col-4">
            <a href="<?= url("detalhes"); ?>"> 
                <img src="assets/images/product-12.png">
            </a>
            
            <a href="<?= url("detalhes"); ?>">
                <h4>ex</h4>
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

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
        </div>

    </div>
    </body>
</html>