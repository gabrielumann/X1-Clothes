<?php $this->layout("_theme", ['title' => $title]); ?>
<h1> oi eu sou a <?= $title?></h1>

<div class="container">
    <h2>Formulário de Cadastro de Usuários</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="papel">Papel:</label>
            <select id="papel" name="papel" required>
                <option value="admin">Admin</option>
                <option value="padrao">Padrão</option>
            </select>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem do Usuário:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*">
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>

<div class="container">
    <h2>Formulário de Cadastro de Endereço</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <!-- Opções para os estados do Brasil -->
            </select>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>