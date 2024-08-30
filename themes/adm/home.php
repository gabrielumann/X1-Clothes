<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/adm/assets/css/home.css">
<?php $this->end(); ?>
<?php $this->start("specific-script")?>
<script src="<?= url("themes/adm/assets/js/home.js"); ?>" async></script>
<?php $this->end(); ?>


<div class="container">
    <div class="dashboard">
        <h1>Dashboard de Vendas</h1>
        <select id="date-range" onchange="updateSales()">
            <option value="week">Última semana</option>
            <option value="month">Último mês</option>
            <option value="six-months">Últimos 6 meses</option>
            <option value="all">Todas</option>
        </select>
    </div>
    <main class="cardMain">
        <div class="card">
            <h2>Total de Vendas</h2>
            <p id="total-sales">$0.00</p>
        </div>
    </main>
</div>
<script src="script.js"></script>




