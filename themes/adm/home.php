<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/adm/assets/css/home.css">
<?php $this->end(); ?>
<?php $this->start("specific-script")?>
<script src="<?= url("themes/adm/assets/js/products.js"); ?>" async></script>
<?php $this->end(); ?>

<h1> AQ estao seus pedidos listados</h1>



