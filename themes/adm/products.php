<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-script")?>
        <script src="<?=url("themes/adm/assets/js/products/products.js")?>" type="module" async></script>
        <script src="<?=url("themes/adm/assets/js/products/_register.js")?>" type="module" async></script>
        <script src="<?=url("themes/adm/assets/js/products/_update.js")?>" type="module" async></script>
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
        <tbody class="products-list">
<!--        <tr id="${e.id}">-->
<!--            <td>${e.id}</td>-->
<!--            <td><img src="/X1-Clothes/storage/images/products/${e.product_image[0].image}" alt="Imagem do Produto" class="produto-img"></td> -->
<!--            <td>${e.name}</td>-->
<!--            <td>R$ ${e.price_brl.toFixed(2).toString().replace(".", ",")}</td>-->
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
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="price_brl">Preço:</label>
                <input type="text" id="price_brl" name="price_brl" required placeholder="0.00" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
            </div>

            <div class="form-group">
                <label for="color">Cor:</label>
                <input type="text" id="color" name="color">
            </div>
            <div class="form-group">
                <label for="category">Categoria:</label>
                <select id="category" name="category_id" >
                    <option value="">Selecione uma Categoria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="size">Tamanho:</label>
                <select id="size" name="size_id">
                    <option value="">Selecione uma Categoria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Marca:</label>
                <select id="brand" name="brand_id">
                    <option value="">Selecione uma Marca</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-image">Imagem Principal:</label>
                <input type="file" id="product-image" name="product-image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="current-complementary-images">Imagens Complementares:</label>
                <input type="file" id="comp-image-1" name="comp-image-1" accept="image/*">
                <input type="file" id="comp-image-2" name="comp-image-2" accept="image/*">
                <input type="file" id="comp-image-3" name="comp-image-3" accept="image/*">
                <input type="file" id="comp-image-4" name="comp-image-4" accept="image/*">
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
                <label for="current-main-image">Imagem Principal Atual:</label>
                <img id="current-main-image" src="" alt="Imagem Principal">
                <input type="file" id="new-product-image" name="new-product-image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="current-complementary-images">Imagens Complementares Atuais:</label>
                <div id="complementary-images-container">
                    <img id="current-comp-image-1" src="" alt="Complementar 1">
                    <input type="file" id="new-comp-image-1" name="new-comp-images[]" accept="image/*">

                    <img id="current-comp-image-2" src="" alt="Complementar 2">
                    <input type="file" id="new-comp-image-2" name="new-comp-images[]" accept="image/*">

                    <img id="current-comp-image-3" src="" alt="Complementar 3">
                    <input type="file" id="new-comp-image-3" name="new-comp-images[]" accept="image/*">

                    <img id="current-comp-image-4" src="" alt="Complementar 4">
                    <input type="file" id="new-comp-image-4" name="new-comp-images[]" accept="image/*">
                </div>
            </div>

            <button type="submit">Atualizar Produto</button>
        </form>

    </div>
</div>
