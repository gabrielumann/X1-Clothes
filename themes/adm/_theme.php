<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->e($title)?></title>

        <?php if ($this->section("specific-style")): ?>
            <?= $this->section("specific-style"); ?>
        <?php endif; ?>
        <link rel="stylesheet" href="<?= url("themes/shared/css/toast.css")?>">
        <link rel="stylesheet" href="<?= url("themes/adm/assets/css/home.css")?>">
        <link rel="stylesheet" href="<?= url("themes/adm/assets/css/modal.css")?>">

        <?php if ($this->section("specific-script")): ?>
            <?= $this->section("specific-script"); ?>
        <?php endif; ?>

        <script src="<?= url("themes/adm/assets/js/modal.js"); ?>" async></script>
        <script src="<?= url("themes/adm/assets/js/_theme.js"); ?>" type="module" async></script>
    </head>
    <body>
        <header class="header">
            <div class="logo">
                <img src="<?= url("themes/shared/images/icon/logo2x1.png")?>" alt="Logo da Empresa">
            </div>
            <div class="admin-area">
                Área de Administração
            </div>
        </header>
        <div id="toast-container"></div>
        <div class="container">
            <aside class="sidebar">
                <ul>
                    <li><a href="<?= url("adm/usuarios"); ?>" id="users">Usuários</a></li>
                    <li><a href="<?= url("adm/enderecos"); ?>" id="addresses">Endereços</a></li>
                    <li><a href="<?= url("adm/faqs"); ?>" id="faqs">FAQS</a></li>
                    <li><a href="<?= url("adm/produtos"); ?>" id="products">Produtos</a></li>
                    <li><a href="<?= url("adm/marcas"); ?>" id="brands">Marcas</a></li>
                    <li><a href="<?= url("adm/categorias"); ?>" id="categories">Categorias</a></li>
                    <li><a href="<?= url("adm/"); ?>" id="users">Pedidos</a></li>
                    <li><a href="<?= url("adm/estoque"); ?>" id="stock">Estoque</a></li>
                </ul>
            </aside>

            <main class="content">
                <?php
                    echo $this->section("content");
                ?>
            </main>
        </div>
    </body>
</html>