<!DOCTYPE html>
<html lang="EN">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../../image/logo.png" />
        <link rel="stylesheet" type="text/css" href="../css/profile.css">
        <title>
            Profile
        </title>
    </head>
    <body>
        <header>
            <img src="../../image/banner-2.0.png" alt="Big-Logo">
        </header>
        <?php
            include "../phpFile/view.php";
            $view=new view();
            $view->start(0);
            if(isset($_COOKIE['username'])){
                $view->index1PHP(0);
                $view->addNewPHP(3);
                $view->profilePHP(2);
                $view->calculatorPHP(3);
                $view->manualPHP(3);
            } else {
                setcookie("accesinterzis",1,time() + 3,"/");
                header("Location: ../../index.php");
            }
            $view->start(2);
        ?>
        <div class="profilImage">
            <img src="../../image/Profil_Baiat.png" alt="Profil">
            
        </div>
        <aside>
            <h2>Pirlog Marcel Ionut</h2>
            <h2>Email: marcelino_ionut97@yahoo.com</h2>
            <h3>Inaltime: x metri si y centimetri</h3>
            <h3>Greutate: z kilograme</h3>
            <h3>Indicele de masa corporala: t </h3>
        </aside>
        <div class="reteteUrmate">
            <h1>
                Retete pe care le-am urmat.
            </h1>
        </div>
        <div class="boxLine">
            <div class="box1">
                <h1>Reteta magica de slabit</h1>
                <h2>Dimineata: </h2>
                <h2>Pranz: </h2>
                <h2>Seara: </h2>
            </div>
            <div class="box2">
                <h1>Reteta de ingrasat</h1>
                <h2>Dimineata: </h2>
                <h2>Pranz: </h2>
                <h2>Seara: </h2>
            </div>
        </div>
        <div class="reteteUrmate">
            <h1>
                Retete pe care eu le-am postat.
            </h1>
        </div>
        <div class="boxLine">
            <div class="box1">
                <h1>Reteta magica de slabit</h1>
                <h2>Dimineata: </h2>
                <h2>Pranz: </h2>
                <h2>Seara: </h2>
            </div>
            <div class="box2">
                <h1>Reteta de ingrasat</h1>
                <h2>Dimineata: </h2>
                <h2>Pranz: </h2>
                <h2>Seara: </h2>
            </div>
        </div>
        <footer>
          <ul>
            <li><div id="image">
                  <img src="../../image/banner-2.0.png" alt="" height="35" width="120"> 
                </div>
            </li>
            <li>
              <div class="footerfix">
                <p>Copyright Cal-o-Web 2019.All rights reserved.</p>
              </div>
            </li>
          </ul>
        </footer>
    </body>
</html>