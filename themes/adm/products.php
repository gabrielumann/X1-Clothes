<?php $this->layout("_theme", ['title' => $title]); ?>
<h1> oi eu sou a <?= $title?></h1>

<div class="container">
    <h2>Formulário de Cadastro de Produtos</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="nome-produto">Nome do Produto:</label>
            <input type="text" id="nome-produto" name="nome-produto" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" required>

        </div>
        <div class="form-group">
            <label for="imagem-produto">Imagem do Produto:</label>
            <input type="file" id="imagem-produto" name="imagem-produto" accept="image/*">

        </div>
        <div class="form-group">
            <label for="imagens-complementares">Imagens Complementares:</label>
            <input type="file" id="complementar1" name="imagens-complementares" accept="image/*">
            <input type="file" id="complementar2" name="imagens-complementares" accept="image/*">
            <input type="file" id="complementar3" name="imagens-complementares" accept="image/*">
            <input type="file" id="complementar4" name="imagens-complementares" accept="image/*">

        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="roupas">Roupas</option>
                <option value="bebidas">Bebidas</option>
            </select>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>
