<?php $this->layout("_theme", ['title' => $title]); ?>
<section id="faqs-section" class="section">
    <div class="section-header">
        <h1>FAQs</h1>
    <div>
        <button class="add-btn">Adicionar FAQ</button>
        <button class="add-btn">Adicionar Categoria</button>
    </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Pergunta</th>
            <th>Resposta</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>O que é o produto A?</td>
            <td>O produto A é...</td>
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
        <h2>Cadastro de FAQ</h2>
        <form action="/submit" method="post">
            <div class="form-group">
                <label for="question">Pergunta:</label>
                <input type="text" id="question" name="question" required>
            </div>
            <div class="form-group">
                <label for="answer">Resposta:</label>
                <textarea id="answer" name="answer" rows="4" required></textarea>
            </div>
            <label for="category">Categoria:</label>
            <select id="category" name="category" required>
                <option value="">Selecione uma Categoria</option>

            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Cadastro de Categoria FAQ</h2>
        <form action="/submit" method="post">
            <div class="form-group">
                <label for="description">Categoria:</label>
                <input type="text" id="description" name="description" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>