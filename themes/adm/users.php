<?php $this->layout("_theme", ['title' => $title]); ?>

<section id="usuarios-section" class="section">
    <div class="section-header">
        <h1>Usuários</h1>
        <button class="add-btn">Adicionar Usuário</button>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Usuário A</td>
            <td>usera@email.com</td>
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
        <h2>Cadastro de Usuário</h2>
        <form action="/submit" method="POST">
            <label for="first_name">Primeiro Nome:</label>
            <input type="text" id="first_name" name="first_name" required><br><br>

            <label for="last_name">Último Nome:</label>
            <input type="text" id="last_name" name="last_name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="XXX.XXX.XXX-XX" required><br><br>

            <label for="role">Papel:</label>
            <select id="role" name="role" required>
                <option value="">Selecione um papel</option>
                <option value="ADMIN">Admin</option>
                <option value="DEFAULT">Default</option>
            </select><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>

