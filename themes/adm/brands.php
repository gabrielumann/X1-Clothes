<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-script")?>
<script src="<?=url("themes/adm/assets/js/brand/brand.js")?>" type="module" async></script>
<script src="<?=url("themes/adm/assets/js/brand/brand_register.js")?>" type="module" async></script>
<script src="<?=url("themes/adm/assets/js/brand/brand_update.js")?>" type="module" async></script>

<?php $this->end(); ?>
<section id="marcas-section" class="section">
    <div class="section-header">
        <h1>Marcas</h1>
        <button class="add-btn" id="btn-open-create-modal">Adicionar Marca</button>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody id="brands-list">
        <tr>
            <td>1</td>
            <td>Marca A</td>
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
        <h2>Cadastro de Marca</h2>
        <form id="form-register" method="post">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close-btn close-update-modal">&times;</span>
        <h2>Edição de Marca</h2>
        <form id="form-update" method="post">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Editar</button>
        </form>
    </div>
</div>
