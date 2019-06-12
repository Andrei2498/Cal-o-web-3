<!DOCTYPE html>
<html lang="EN">

    <head>
        <title>Cal o web</title>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
        <link rel="stylesheet" type="text/css" href="../pageCod/css/man.css">

    </head>

    <body>
        <header>
            <img src="../image/banner-2.0.png" alt="Big-Logo">
        </header>
        <?php
        include "../pageCod/phpFile/view.php";
        $view=new view();
        $view->start(0);
        if(isset($_COOKIE['username'])){
          $view->index1PHP(0);
          $view->addNewPHP(3);
          $view->profilePHP(3);
          $view->calculatorPHP(3);
          $view->manualPHP(2);
          $view->logout(0);
        } else {
          $view->index1PHP(0);
          $view->loginPHP(3);
          $view->registerPHP(3);
          $view->recoverPHP(3);
          $view->manualPHP(2);
        }
        $view->start(2);
        ?>
        <div class="form">
            <h1>
                MANUAL
            </h1>
            <h4>
                Pe acesta pagina veti invata cum se foloseste aplicatia noastra si ce trebuie sa faceti
                 pentru a o folosi cu succes.
            </h4>
            <div class="position">
                <div class="newList">
                    <a id="hml" href="#log">Login</a>
                    <a href="#reg">Register</a>
                    <a href="#clc">Calculator</a>
                    <a href="#rep">Add Recipe</a>
                </div>
            </div>
            <div id="reg" class="registerManual">
                <h4 class="sectiune">Sectiunea de inregistrare</h4>
                <p>
                    Pentru a va crea un cont in aplicatia noastra aveti nevoie doar de o adresa de email
                    valida.
                </p>
                <p>
                    Cand completati campurile trebuie sa resectati urmatoarele reguli:
                </p>
                <ul>
                    <li>Numele si prenumele trebuie sa inceapa cu litera mare si sa contina doar litere</li>
                    <li>Emailul trebuie sa fie valid</li>
                    <li>Usernameul intredus trebuie sa fie usinc in aplicatia noastra</li>
                    <li>Parolele trebuie sa coincida</li>
                </ul>
                <p>
                    Dupa ce va creati un cont trebuie sa completati profilul de utilizator.
                    Daca inchideti acest proces contul nu va fi creat si va trebui sa incepeti de la inceput.
                    Datele de profil trebuie sa respecte urmatoarele contitii:
                </p>
                <ul>
                    <li>Varsta sa fie cuprinsa intre 1 si 130</li>
                    <li>Greutatea intre 15 si 200 Kg</li>
                </ul>
                <p>
                    Acum ve-ti gasi un scurt video tutorial in care aveti un exemplu de introducere a
                    datelor. Si crearea cu succes a unui cont.
                </p>
                <iframe width="100%"
                        height="500em"
                        src="https://www.youtube.com/embed/1KYxF8iPHdw">
                </iframe>
                <div class="goTop"><a href="#hml">Go Top</a></div>
            </div>
            <div id="log" class="loginManual">
                <h4 class="sectiune">Sectiunea de logare</h4>
                <p>
                    Pentru a va loga in aplicatia noastra este nevoie sa aveti un cont creat la noi.
                </p>
                <p>
                    In acesta sesiune aveti un scurt video in care sunt prezentati pasii pentru procesul
                    de login.
                </p>
                <iframe width="100%"
                        height="500em"
                        src="https://www.youtube.com/embed/TT-UC6ejr1k">
                </iframe>
                <p>
                    In continuare puteti urmari tutoriale cum sa fa adaugati o retena sau sa va calculati caloriile
                    de pe ziua curenta.
                </p>
                <div class="goTop"><a href="#hml">Go Top</a></div>
            </div>
            <div id="clc" class="calculatorManual">

            </div>
            <div id="rep" class="recipeManual">
                <h4 class="sectiune">Sectiunea de adaugare a unei retete</h4>
                <p>
                    In videoul care urmeaza puteti urmari cum sa va adaugati o reteta si cum sa o vedeti
                    dupa ce ati adaugato.
                </p>
                <p>
                    Reteta trebuie sa contina urmatoarele:
                </p>
                <ul>
                    <li>Numele sa fie compus doar din caractere</li>
                    <li>Sa contina minim 1 ingredient</li>
                    <li>Sa contina doar ingrediente din baza noastra de date.</li>
                    <li>Un numar decent de produse ( maxim 10 ).</li>
                </ul>
                <p>
                    Daca respectati toate aceste cerinte reteta adaugata de dumneavoastra va putea fi
                    vizibila pe profi in sectiunea "Retete pe care le-am creat".
                </p>
                <iframe width="100%"
                        height="500em"
                        src="https://www.youtube.com/embed/ALqBMgUBrP4">
                </iframe>
                <div class="goTop"><a href="#hml">Go Top</a></div>
            </div>
        </div>
    </body>
</html>