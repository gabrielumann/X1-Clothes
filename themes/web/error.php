<?php
echo $this->layout("_theme");
?>
<?php
$this->start("specific-style");
?>
<link rel="stylesheet" href="<?= url("/assets/css/404.css"); ?>">
<link rel="stylesheet" href="<?= url("/assets/css/style .css"); ?>">
<?php
$this->end();
?>

<div class="container">
    <div class="row">
        <div class="col-2">
            <img  src="../../assets/images/dog.png" >
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
