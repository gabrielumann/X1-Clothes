<?php $this->layout("_theme", ['title' => $title]); ?>

<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/web/assets/css/error.css">
<?php $this->end(); ?>


<div class="container">
    <div class="row">
        <div class="col-2">
            <img  src="assets/images/dog.png" >
        </div>
        <div class="col-2">
            <h1>404</h1>
            <p> ops, acho que você esta no lugar errado....</p>
            <p>
                <a href="<?= url(); ?>">clique aqui</a> para ser redirecionado para a página inicial!
            </p>

        </div>

    </div>
</div>
