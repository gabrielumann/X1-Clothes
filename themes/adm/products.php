<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-script")?>
<script src="<?=url("themes/adm/assets/js/products.js")?>" type="module" async></script>
<?php $this->end(); ?>
<section id="produtos-section" class="section">
    <div class="section-header">
        <h1>Produtos</h1>
        <div>
            <button class="add-btn">Adicionar Produto</button>
            <button class="add-btn">Adicionar Imagem</button>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th> <!-- Nova coluna para imagens -->
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody class="products">
<!--        <tr>-->
<!--            <td>1</td>-->
<!--            <td><img src="produto1.jpg" alt="Produto A" class="produto-img"></td> -->
<!--            <td>Produto A</td>-->
<!--            <td>R$ 50,00</td>-->
<!--            <td>-->
<!--                <button class="edit-btn">Editar</button>-->
<!--                <button class="delete-btn">Excluir</button>-->
<!--            </td>-->
<!--        </tr>-->
        </tbody>
    </table>
</section>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
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
                <label for="comp-images">Imagens Complementares:</label>
                <input type="file" id="product-complementary-images" name="comp-images[]" accept="image/*" multiple="multiple">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Cadastro de Imagem</h2>
        <form id="form-image" action="#" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <label for="product">Produto:</label>
                <select id="product" name="product" required>
                    <option value="">Selecione um Produto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-image">Imagem Principal:</label>
                <input type="file" id="product-image" name="product-image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="comp-images">Imagens Complementares():</label>
                <input type="file" id="product-complementary-images" name="comp-images[]" accept="image/*" multiple="multiple">
            </div>
            <button type="submit" name="image-add">Adicionar</button>
        </form>
    </div>
</div>
