<?php $this->layout("_theme", ['title' => $title]); ?>

<section id="produtos-section" class="section">
    <div class="section-header">
        <h1>Produtos</h1>
        <button class="add-btn">Adicionar Produto</button>
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
        <tbody>
        <tr>
            <td>1</td>
            <td><img src="produto1.jpg" alt="Produto A" class="produto-img"></td> <!-- Exemplo de imagem -->
            <td>Produto A</td>
            <td>R$ 50,00</td>
            <td>
                <button class="edit-btn">Editar</button>
                <button class="delete-btn">Excluir</button>
            </td>
        </tr>
        </tbody>
    </table>
</section>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Cadastro de Produto</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Nome do Produto:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Preço:</label>
                <input type="text" id="price" name="price" required>

            </div>
            <div class="form-group">
                <label for="image">Imagem do Produto:</label>
                <input type="file" id="image" name="image" accept="image/*">

            </div>
            <div class="form-group">
                <label for="comp-images">Imagens Complementares:</label>
                <input type="file" id="comp1" name="comp-images" accept="image/*">
                <input type="file" id="comp2" name="comp-images" accept="image/*">
                <input type="file" id="comp3" name="comp-images" accept="image/*">
                <input type="file" id="comp4" name="comp-images" accept="image/*">

            </div>
            <div class="form-group">
                <label for="category">Categoria:</label>
                <select id="category" name="category" required>
                    <option value="">Selecione uma Categoria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="brand">Marca:</label>
                <select id="brand" name="brand" required>
                    <option value="">Selecione uma Marca</option>
                </select>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
