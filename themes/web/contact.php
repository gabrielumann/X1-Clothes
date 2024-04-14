<?php
    echo $this->layout("_theme");       
?>

<!DOCTYPE html>
<html lang="pt-r">
<body>

        
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img  src="/images/centralcee.png" >
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span >Fale conosco</span>
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


<!--    brands     -->
<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="/images/logo-godrej.png">
            </div>
            <div class="col-5">
                <img src="/images/logo-oppo.png">
            </div>
            <div class="col-5">
                <img src="/images/logo-coca-cola.png">
            </div>
            <div class="col-5">
                <img src="/images/logo-paypal.png">
            </div>
            <div class="col-5">
                <img src="/images/logo-philips.png">
            </div>
        </div>
    </div>
</div>

</body>
</html>
