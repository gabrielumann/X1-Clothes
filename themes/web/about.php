<!DOCTYPE html>
<html lang="en">    
<body>


        
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img  src="/images/centralcee.png" >
                </div>
                <div class="col-2">
                    <h1>Quem somos?</h1>
                    <p>
                        A X1 Clothes se destina a jovens adultos (entre 18 e 35 anos) que valorizam a moda como uma forma de expressão pessoal 
                        e estão sempre em busca das últimas tendências. Nosso público-alvo é formado por indivíduos que procuram por uma 
                        experiência de compra única, onde possam encontrar uma ampla variedade de produtos que reflitam seu estilo de vida 
                        dinâmico e contemporâneo.

                    </p>
                    <a href="pages/products.html" class="btn">Explore Now &#8594;</a>
                </div>

            </div>
        </div>



<!--------      testimonial       ------------- -->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero quisquam cupiditate accusamus facere laudantium iste eveniet debitis ea,
                
                </p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="/images/user-1.png">
                <h3>Sean Parker</h3>

            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero quisquam cupiditate accusamus facere laudantium iste eveniet debitis ea,
                
                </p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="/images/user-2.png">
                <h3>Max Retch</h3>

            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Libero quisquam cupiditate accusamus facere laudantium iste eveniet debitis ea,
                
                </p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <img src="/images/user-3.png">
                <h3>Ana Mobs</h3>

            </div>
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

<!--    footer     -->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>
                    Download App for Android and ios mobile phone.
                </p>
                <div class="app-logo">
                    <img src="/images/play-store.png">
                    <img src="/images/app-store.png">
                </div>
            </div>
            <div class="footer-col-2">
                <div class="logo">
                    <a href="../index.html"><span id="bel">BEL </span><span id="lgw">STORE</span>
                    </a>
                    </div>
                <p>
                    Our Purpose Is To Sustainably Make the Pleasure
                    and Benefits of Sports Accessible to the Many.
                </p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li> 
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li> 
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
      
    </div>
</div>


<!--      js for toggle menu      -->
<script>
    var MenuItems = document.getElementById("menuItems");

    MenuItems.style.maxHeight = "0px";

    function  menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px"
        }
        else
        {
            MenuItems.style.maxHeight = "0px"
        }
}
</script>

</body>
</html>