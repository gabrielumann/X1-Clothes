<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-script")?>
        <script src="<?=url("themes/adm/assets/js/products/products.js")?>" type="module" async></script>
        <script src="<?=url("themes/adm/assets/js/products/product_register.js")?>" type="module" async></script>
        <script src="<?=url("themes/adm/assets/js/products/product_update.js")?>" type="module" async></script>
<?php $this->end(); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="<?= url("themes/adm/assets/css/products.css")?>">
<?php $this->end(); ?>
<section id="produtos-section" class="section">
    <div class="section-header">
        <h1>Produtos</h1>
        <div>
            <button class="add-btn" id="btn-open-create-modal">Adicionar Produto</button>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th id="img">Imagem</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody id="products-list">
<!--        <tr id="1">-->
<!--            <td>${e.id}</td>-->
<!--            <td><img src="" alt="Imagem do Produto" class="product-img"></td>-->
<!--            <td>${e.name}</td>-->
<!--            <td>R$ </td>-->
<!--            <td>-->
<!--                <button class="edit-btn">Editar</button>-->
<!--                <button class="delete-btn">Excluir</button>-->
<!--            </td>-->
<!--        </tr>`-->
        </tbody>
    </table>
</section>
<div id="createModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-create-modal">&times;</span>
        <h2>Cadastro de Produto</h2>
        <form id="form-register"  method="POST" enctype='multipart/form-data'>
            <div class="form-group">
                <label for="name">Nome do Produto:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price_brl">Preço:</label>
                <input type="text" id="price_brl" name="price_brl" required placeholder="0.00" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
            </div>
            <div class="form-group">
                <label for="color">Cor:</label>
                <input type="text" id="color" name="color" required>
            </div>
            <div class="form-group">
                <label for="category">Categoria:</label>
                <select id="category" name="category_id" required>
                    <option value="">Selecione uma Categoria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="size">Tamanho:</label>
                <select id="size" name="size_id" required>
                    <option value="">Selecione uma Categoria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Marca:</label>
                <select id="brand" name="brand_id" required>
                    <option value="">Selecione uma Marca</option>
                </select>
            </div>
            <div class="form-group">
                <label for="principal_image">Imagem Principal:</label>
                <input type="file" id="principal_image" name="principal_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="additional_image_1">Imagens Complementares:</label>
                <input type="file" id="additional_image_1" name="additional_image_1" accept="image/*" required>
                <input type="file" id="additional_image_2" name="additional_image_2" accept="image/*" required>
                <input type="file" id="additional_image_3" name="additional_image_3" accept="image/*" required>
                <input type="file" id="additional_image_4" name="additional_image_4" accept="image/*" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-update-modal">&times;</span>
        <h2>Atualizar Produto</h2>
        <form id="form-update-product" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nome do Produto:</label>
                <input type="text" id="name" name="name" value="" required>
            </div>
            <div class="form-group">
                <label for="price_brl">Preço (R$):</label>
                <input type="text" id="price_brl" name="price_brl" required placeholder="0.00" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
            </div>
            <div class="form-group">
                <label for="color">Cor:</label>
                <input type="text" id="color" name="color" value="" required>
            </div>
            <div class="form-group">
                <label for="category">Categoria:</label>
                <select id="category" name="category_id" required>
                    <option value="" selected></option>
                </select>
            </div>
            <div class="form-group">
                <label for="size">Tamanho:</label>
                <select id="size" name="size_id" required>
                    <option value="" selected></option>
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Marca:</label>
                <select id="brand" name="brand_id" required>
                    <option value="" selected></option>
                </select>
            </div>
            <h2>Atualizar Imagens do Produto</h2>
            <div class="form-group">
                <label for="principal_image">Imagem Principal Atual:</label>
                <img id="current-main-image" src="" alt="Imagem Principal">
                <input type="file" id="new-principal-image" name="new-principal-image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="current-complementary-images">Imagens Complementares Atuais:</label>
                <div id="complementary-images-container">
                    <img id="current-comp-image-1" src="" alt="Complementar 1">
                    <input type="file" id="new-comp-image-1" name="new-comp-image-1" accept="image/*">

                    <img id="current-comp-image-2" src="" alt="Complementar 2">
                    <input type="file" id="new-comp-image-2" name="new-comp-image-2" accept="image/*">

                    <img id="current-comp-image-3" src="" alt="Complementar 3">
                    <input type="file" id="new-comp-image-3" name="new-comp-image-3" accept="image/*">

                    <img id="current-comp-image-4" src="" alt="Complementar 4">
                    <input type="file" id="new-comp-image-4" name="new-comp-image-4" accept="image/*">
                </div>
            </div>

            <button type="submit">Atualizar Produto</button>
        </form>

    </div>
</div>
