<?php $this->layout("_theme", ['title' => $title]); ?>
<h1> oi eu sou a <?= $title?></h1>


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