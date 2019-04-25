
<!DOCTYPE html>
<html lang="EN">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Cal o web</title>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo.png" />
    </head>
    
    <body>
        <header>
            <img src="image/banner-2.0.png" alt="Big-Logo">
        </header>
        <?php
        include "./pageCod/phpFile/view.php";
        $view=new view();
        $view->start(0);
        if(isset($_COOKIE['username'])){
          $view->index1PHP(1);
          $view->addNewPHP(0);
          $view->profilePHP(0);
          $view->calculatorPHP(0);
          $view->manualPHP(0);
        } else {
          $view->index1PHP(1);
          $view->loginPHP(0);
          $view->registerPHP(0);
          $view->recoverPHP(0);
          $view->manualPHP(0);
        }
        $view->start(2);
        if(isset($_COOKIE['accesinterzis'])){
          echo '<div class="interzis">
          <h2>
            Accesul persoanelor nelogate catrea acea pagina este interzisa.
          </h2>
          <h2>
            <a href="pageCod/page/login.php">Loghaza-te</a> sau <a href="pageCod/page/Register.php">
            inregistreaza-te</a> pentru a accesa acea pagina.
            </h2>
          </div>';
        }
        ?>
        <div class="slideshow-container">
            <div class="mySlides fade">
              <img src="image/calories5res.jpg" alt="Image1">
            </div>
            <div class="mySlides fade">
              <img src="image/images.jpg" alt="Image2">
            </div>
            <div style="opacity: 0;">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>     
        </div>
        <div class="aplicationInformation">
            <h3>
              &nbsp;&nbsp;&nbsp;&nbsp;Cal o web este o aplicatie care contorizeaza alimentele pe care consumati 
              cat si nivelul caloric al acestira pentru a va ajuta sa va mentineti 
              cat mai sanatos.
            </h3>
            <h3>
              &nbsp;&nbsp;&nbsp;&nbsp;Pentru a utiliza aceasta aplicatie trebuie sa fiti <a href="pageCod/page/login.php">logat</a> cu un cont valid. 
              Daca nu aveti un cont apasati <a href="pageCod/page/Register.php">aici</a> pentru a va crea imediat un cont.
            </h3>
            <h3>
              &nbsp;&nbsp;&nbsp;&nbsp;In cazul in care sunteti pentru prima data la noi pe site 
              va recomandam sa parcurgeti un scurt tutorial disponibil la linkul urmator <a href="pageCod/page/manual.php">tutorial</a>
            </h3>
        </div>
        <footer>
          <ul>
            <li><div id="image">
                  <img src="image/banner-2.0.png" alt="" height="35" width="120"> 
                </div>
            </li>
            <li>
              <div class="footerfix">
                <p>Copyright Cal-o-Web 2019.All rights reserved.</p>
              </div>
            </li>
          </ul>
        </footer>
        <script>
            var slideIndex = 0;
            showSlides();
            function showSlides() {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 5000);
            }
        </script>
    </body>
</html>