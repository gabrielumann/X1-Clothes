<?php $this->layout("_theme", ['title' => $title]); ?>
<?php $this->start("specific-style")?>
<link rel="stylesheet" href="themes/adm/assets/css/form.css">
<?php $this->end(); ?>

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

        <div class="container">
            <h2>Formulário de Avaliação</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="nota">Nota:</label>
                    <select id="nota" name="nota" required>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comentario">Comentário:</label>
                    <textarea id="comentario" name="comentario" rows="4" required></textarea>
                </div>
                <button type="submit">Enviar Avaliação</button>
            </form>
        </div>
        
        <div class="container">
            <h2>Formulário de FAQ</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="pergunta">Pergunta:</label>
                    <input type="text" id="pergunta" name="pergunta" required>
                </div>
                <div class="form-group">
                    <label for="resposta">Resposta:</label>
                    <textarea id="resposta" name="resposta" rows="4" required></textarea>
                </div>
                <button type="submit">Enviar FAQ</button>
            </form>
        </div>

