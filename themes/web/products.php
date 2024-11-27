<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/web/assets/css/products.css">
<?php $this->end(); ?>
<?php $this->start("specific-script")?>
<script src="<?=url("themes/web/assets/js/products.js")?>" type="module" async></script>
<?php $this->end(); ?>

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
            <a href="#"><img class="search-icon" src="themes/shared/images/interface/iconSearch.png"></a>
        </form>
    </div>

<div class="content">
    <div class="small-container">

<!--    <div class="col-4" id="${product.id}">-->
<!--        <a href="detalhes">-->
<!--            <img src="${ImagesLocalPath + principalImage}">-->
<!--        </a>-->
<!---->
<!--        <a href="detalhes">-->
<!--            <h4>${product.name}</h4>-->
<!--        </a>-->
<!--        <div class="rating">-->
<!--            <i class="fa fa-star"></i>-->
<!--            <i class="fa fa-star"></i>-->
<!--            <i class="fa fa-star"></i>-->
<!--            <i class="fa fa-star"></i>-->
<!--            <i class="fa fa-star-o"></i>-->
<!--        </div>-->
<!--        <p>${product.price_brl.toFixed(2).toString().replace(".", ",")}</p>-->
<!--    </div>`-->


<!--        <div class="page-btn">-->
<!--            <span>1</span>-->
<!--            <span>2</span>-->
<!--            <span>3</span>-->
<!--            <span>4</span>-->
<!--            <span>&#8594;</span>-->
<!--        </div>-->

    </div>
</div>