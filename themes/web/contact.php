<?php
    echo $this->layout("_theme");       
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>

        
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img  src="assets/images/centralcee.png" >
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <p>Fale conosco</p>
                            <hr id="Indic">
                        </div>
                        <form id="ContactForm">
                            <input type="text" placeholder="Usuário">
                            <input type="email" placeholder="Email">
                            <textarea  id="" cols="32" rows="3" placeholder="Escreva sua Mensagem"></textarea>
                            <button type="submit" class="btn">Enviar</button>
                            
                        </form>

                    </div>
                </div>

            </div>



</body>
</html>
