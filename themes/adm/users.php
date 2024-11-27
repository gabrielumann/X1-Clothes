<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-script")?>
<script src="<?=url("themes/adm/assets/js/user/users.js")?>" type="module" async></script>
<script src="<?=url("themes/adm/assets/js/user/user_register.js")?>" type="module" async></script>
<script src="<?=url("themes/adm/assets/js/user/user_update.js")?>" type="module" async></script>
<?php $this->end(); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="<?= url("themes/adm/assets/css/user.css")?>">
<?php $this->end(); ?>
<section id="usuarios-section" class="section">
    <div class="section-header">
        <h1>Usuários</h1>
        <button class="add-btn" id="btn-open-create-modal">Adicionar Usuário</button>
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
        <tbody id="user-list">
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
<div id="createModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-create-modal">&times;</span>
        <h2>Cadastro de Usuário</h2>
        <form id="form-register" method="POST">
            <div class="form-group">
                <label for="first_name">Primeiro Nome:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Último Nome:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="text" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="passwordConfirmed">Confirme a Senha:</label>
                <input type="text" id="passwordConfirmed" name="passwordConfirmed" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="11" placeholder="XXX.XXX.XXX-XX" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
            </div>
            <div class="form-group">
                <label for="role">Papel:</label>
                <select id="role" name="role" required>
                    <option value="">Selecione um papel</option>
                    <option value="ADMIN">Admin</option>
                    <option value="DEFAULT">Default</option>
                </select><br><br>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-update-modal">&times;</span>
        <h2>Edição de Usuário</h2>
        <form id="form-update" method="post">
            <div class="form-group">
                <label for="first_name">Primeiro Nome:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Último Nome:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="11" placeholder="XXX.XXX.XXX-XX" oninput="this.value=this.value.replace(/[^0-9.]/g,'')">
            </div>
            <div class="form-group">
                <label for="role">Papel:</label>
                <select id="role" name="role" required>
                    <option value="">Selecione um papel</option>
                    <option value="ADMIN">Admin</option>
                    <option value="DEFAULT">Default</option>
                </select><br><br>
            </div>
            <button type="submit">Editar</button>
        </form>
    </div>
</div>
<div id="updateImageModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-update-image-modal">&times;</span>
        <h2>Edição de Usuário</h2>
        <form id="form-update-image" method="post">
            <div class="form-group">
                <img id="current-main-image" class="profile-image" src="" alt="Imagem Principal">
                <label for="image">Alterar imagem:</label>
                <input type="file" id="user-new-image" name="image" accept="image/png, image/jpeg">
            </div>
            <button type="submit">Editar</button>
        </form>
    </div>
</div>

