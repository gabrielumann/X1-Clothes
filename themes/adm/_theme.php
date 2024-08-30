<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->e($title)?></title>
        <link rel="stylesheet" href="<?= url("themes/adm/assets/css/form.css"); ?>">
        <link rel="stylesheet" href="<?= url("themes/adm/assets/css/style.css"); ?>">
        <?php if ($this->section("specific-style")): ?>
            <?= $this->section("specific-style"); ?>
        <?php endif; ?>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="<?= url("themes/adm/assets/js/scripts.js"); ?>" async></script>
        <?php if ($this->section("specific-script")): ?>
            <?= $this->section("specific-script"); ?>
        <?php endif; ?>

    </head>
    <body>

    <div class="header">
            <div class="container1">
                <div class="navbar">
                    <div class="logo">
                        <a href="<?= url("/adm"); ?>"><img src="themes/shared/images/icon/logox1.png">
                        </a>
                    </div>
                    <nav>
                        <ul id="menuItems">
                            <li><p><a href="<?= url("/adm"); ?>">Home</a></p></li>
                            <li><p><a href="<?= url("/adm/produtos"); ?>">Produtos</a></p></li>
                            <li><p><a href="<?= url("/adm/pedidos"); ?>">Pedidos</a></p></li>
                            <li><p><a href="<?= url("/adm/usuarios"); ?>">Usuarios</a></p></li>
                            <li><p><a href="<?= url("/adm/faqs"); ?>">Faqs</a></p></li>
                            <li><p><a href="<?= url("/adm/avaliacao"); ?>">Avaliação</a></p></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>




    <div id="content">
        <!-- Your content goes here -->
        <?php
            echo $this->section("content");
        ?>
    </div>

    </body>
</html>