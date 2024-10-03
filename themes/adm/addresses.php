<?php $this->layout("_theme", ['title' => $title]); ?>
<section id="enderecos-section" class="section">
    <div class="section-header">
        <h1>Endereços</h1>
        <button class="add-btn">Adicionar Endereço</button>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Rua A, 123</td>
            <td>São Paulo</td>
            <td>SP</td>
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
        <h2>Cadastro de Endereço</h2>
        <form action="/submit" method="POST">
            <label for="user_id">ID do Usuário:</label>
            <input type="text" id="user_id" name="user_id" required><br><br>

            <label for="address">Endereço:</label>
            <input type="text" id="address" name="address" required><br><br>

            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" pattern="\d{5}-?\d{3}" placeholder="XXXXX-XXX" required><br><br>

            <label for="state">Estado:</label>
            <select id="state" name="state" required>
                <option value="">Selecione um estado</option>
                <option value="AC">Acre (AC)</option>
                <option value="AL">Alagoas (AL)</option>
                <option value="AP">Amapá (AP)</option>
                <option value="AM">Amazonas (AM)</option>
                <option value="BA">Bahia (BA)</option>
                <option value="CE">Ceará (CE)</option>
                <option value="DF">Distrito Federal (DF)</option>
                <option value="ES">Espírito Santo (ES)</option>
                <option value="GO">Goiás (GO)</option>
                <option value="MA">Maranhão (MA)</option>
                <option value="MT">Mato Grosso (MT)</option>
                <option value="MS">Mato Grosso do Sul (MS)</option>
                <option value="MG">Minas Gerais (MG)</option>
                <option value="PA">Pará (PA)</option>
                <option value="PB">Paraíba (PB)</option>
                <option value="PR">Paraná (PR)</option>
                <option value="PE">Pernambuco (PE)</option>
                <option value="PI">Piauí (PI)</option>
                <option value="RJ">Rio de Janeiro (RJ)</option>
                <option value="RN">Rio Grande do Norte (RN)</option>
                <option value="RS">Rio Grande do Sul (RS)</option>
                <option value="RO">Rondônia (RO)</option>
                <option value="RR">Roraima (RR)</option>
                <option value="SC">Santa Catarina (SC)</option>
                <option value="SP">São Paulo (SP)</option>
                <option value="SE">Sergipe (SE)</option>
                <option value="TO">Tocantins (TO)</option>
            </select><br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
