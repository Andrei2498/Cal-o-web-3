<!DOCTYPE html>
<html lang="EN">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png" />
        <link rel="stylesheet" type="text/css" href="../pageCod/css/profile.css">
        <title>
            Profile
        </title>
    </head>
    <body onload="loadImageProfile()">
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
                $view->profilePHP(2);
                $view->calculatorPHP(3);
                $view->manualPHP(3);
                $view->logout(0);
            } else {
                setcookie("accesinterzis",1,time() + 3,"/");
                header("Location: ../../index.php");
            }
            $view->start(2);
        ?>
        <div id="pi" class="profilImage">

        </div>
        <aside>
            <h2 id="nm">Nume: </h2>
            <h2 id="em">Email: </h2>
            <h3 id="in">Inaltime: </h3>
            <h3 id="gr">Greitate:  </h3>
            <h3 id="imc">Indice de masa corporala:</h3>
        </aside>
        <div id="baza">

        </div>
<!--        <div id="ru" class="reteteUrmate">-->
<!--            <h1 id="hru">-->
<!--                Retete pe care le-am urmat.-->
<!--            </h1>-->
<!--        </div>-->
<!--        class="boxLine"-->
<!--        <div id="bl" >-->
<!--            <div class="box1">-->
<!--                <h1>Reteta magica de slabit</h1>-->
<!--                <h2>Dimineata: </h2>-->
<!--                <h2>Pranz: </h2>-->
<!--                <h2>Seara: </h2>-->
<!--            </div>-->
<!--            <div class="box2">-->
<!--                <h1>Reteta de ingrasat</h1>-->
<!--                <h2>Dimineata: </h2>-->
<!--                <h2>Pranz: </h2>-->
<!--                <h2>Seara: </h2>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div id="rp" class="retetePuse">-->
<!--            <h1 id="hrp">-->
<!--                Retete pe care eu le-am postat.-->
<!--            </h1>-->
<!--        </div>-->
<!--        class="boxLine"-->
<!--        <div id="bl" >-->
<!--            <div class="box1">-->
<!--                <h1>Reteta magica de slabit</h1>-->
<!--                <h2>Dimineata: </h2>-->
<!--                <h2>Pranz: </h2>-->
<!--                <h2>Seara: </h2>-->
<!--            </div>-->
<!--            <div class="box2">-->
<!--                <h1>Reteta de ingrasat</h1>-->
<!--                <h2>Dimineata: </h2>-->
<!--                <h2>Pranz: </h2>-->
<!--                <h2>Seara: </h2>-->
<!--            </div>-->
<!--        </div>-->
        <footer>
          <ul>
            <li><div id="image">
                  <img src="../image/banner-2.0.png" alt="" height="35" width="120">
                </div>
            </li>
            <li>
              <div class="footerfix">
                <p>Copyright Cal-o-Web 2019.All rights reserved.</p>
              </div>
            </li>
          </ul>
        </footer>
        <script src="../javascript/loadProfile.js"></script>
    </body>
</html>