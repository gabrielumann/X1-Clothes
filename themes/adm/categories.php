<?php $this->layout("_theme", ['title' => $title]); ?>
<section id="categorias-section" class="section">
    <div class="section-header">
        <h1>Categorias</h1>
        <button class="add-btn">Adicionar Categoria</button>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Categoria A</td>
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
        <h2>Cadastro de Categoria</h2>
        <form action="/submit" method="post">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="image">Imagem da Categoria:</label>
                <input type="file" id="image" name="image" accept="image/*">

            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
