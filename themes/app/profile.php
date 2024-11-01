<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="<?= url("themes/app/assets/css/profile.css")?>">
<?php $this->end(); ?>
<?php $this->start("specific-script")?>
<script src="<?= url("themes/app/assets/js/profile.js")?>" async type="module"></script>
<script src="<?= url("themes/app/assets/js/profileModal.js")?>" async></script>
<?php $this->end(); ?>
<div class="profile-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <img src="<?= url('themes/shared/images/interface/user-base-icon.jfif')?>" alt="User Photo" class="profile-image user-icon">
        <nav class="profile-menu">
            <a href="#">Dados pessoais</a>
            <a href="#">Endereços</a>
            <a href="#">Pedidos</a>
            <a href="#">Sair</a>
        </nav>
    </aside>

    <!-- Profile details area -->
    <main class="profile-details">
        <h1>Personal Info</h1>
        <div class="personal-info">
            <div class="name-field">
                <div>
                    <label for="firstName">Nome</label>
                    <p id="firstName">John</p>
                </div>
                <div>
                    <label for="lastName">Sobrenome</label>
                    <p id="lastName">Doe</p>
                </div>
            </div>
            <div class="info-field">
                <label for="email">Email</label>
                <p id="email">john.doe@email.com</p>
            </div>
            <div class="info-field">
                <label for="cpf">CPF</label>
                <p id="cpf">123.456.789-00</p>
            </div>
            <div class="buttons">
                <button class="edit-button" id="btn-open-update-modal">Editar</button>
                <button class="change-password-button" id="btn-open-password-modal">Alterar Senha</button>
            </div>
        </div>
    </main>
</div>

<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-update-modal">&times;</span>
        <h2>Edição de Usuário</h2>
        <form id="form-update-user" method="post">
            <div class="form-group">
                <img id="current-main-image" class="profile-image user-icon" src="<?= url('themes/shared/images/interface/user-base-icon.jfif')?>" alt="Imagem Principal">
                <label for="image">Alterar imagem:</label>
                <input type="file" id="user-new-image" name="image" accept="image/png">
            </div>
            <div class="form-group">
                <label for="input-first_name">Primeiro Nome:</label>
                <input type="text" id="input-first_name" name="first_name" required value="John">
            </div>
            <div class="form-group">
                <label for="input-last_name">Último Nome:</label>
                <input type="text" id="input-last_name" name="last_name" required value="Doe">
            </div>
            <div class="form-group">
                <label for="input-email">Email:</label>
                <input type="email" id="input-email" name="email" disabled placeholder="john.doe@email.com">
            </div>
            <div class="form-group">
                <label for="input-cpf">CPF:</label>
                <input type="text" id="input-cpf" name="cpf" maxlength="11" placeholder="123.456.789-00"  disabled>
            </div>
            <button type="submit">Editar</button>
        </form>
    </div>
</div>
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-password-modal">&times;</span>
        <h2>Alterar a senha</h2>
        <form id="form-update-password" method="post">
            <div class="form-group">
                <label for="currentPassword">Senha atual:</label>
                <div class="password-input-wrapper">
                    <input type="password" id="currentPassword" placeholder="Digite sua Senha">
                    <button type="button" class="toggle-password">
                        👁️
                    </button>
                </div>
            </div>
            <div class="form-group">
                <label for="newPassword">Nova senha:</label>
                <div class="password-input-wrapper">
                    <input type="password" id="newPassword" placeholder="Digite sua Nova Senha">
                    <button type="button" class="toggle-password">
                        👁️
                    </button>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirme a nova senha:</label>
                <div class="password-input-wrapper">
                    <input type="password"  id="confirmPassword" placeholder="Confirme sua Nova Senha">
                    <button type="button" class="toggle-password">
                        👁️
                    </button>
                </div>
            </div>
            <button type="submit">Alterar a Senha</button>
        </form>
    </div>
</div>
