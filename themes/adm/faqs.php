<?php $this->layout("_theme", ['title' => $title]); ?>
<h1> oi eu sou a <?= $title?></h1>


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