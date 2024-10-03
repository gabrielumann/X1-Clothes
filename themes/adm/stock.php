<?php $this->layout("_theme", ['title' => $title]); ?>
<section id="estoque-section" class="section">
    <div class="section-header">
        <h1>Estoque</h1>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Produto A</td>
            <td>100</td>
            <td>
                <button class="edit-btn">Editar Quantidade</button>
            </td>
        </tr>
<!--        listar todos os produtos-->
        </tbody>
    </table>
</section>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Alterar Quantidade de Produto no Estoque</h2>
        <form action="/submit" method="POST">
            <label for="product_id">ID do Produto:</label>
            <input type="text" id="product_id" name="product_id" value="12345" readonly><br>

            <label for="product_name">Nome do Produto:</label>
            <input type="text" id="product_name" name="product_name" value="Produto Exemplo" readonly>

            <label for="quantity"> Quantidade:</label>
            <input type="number" id="quantity" name="quantity" min="0" required><br>

            <!-- Botão para Atualizar -->
            <button type="submit">Atualizar Quantidade</button>
        </form>
    </div>
</div>
