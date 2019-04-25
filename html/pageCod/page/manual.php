<!DOCTYPE html>
<html lang="EN">

<head>
    <title>Cal o web</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../image/logo.png" />
    <link rel="stylesheet" type="text/css" href="../css/man.css">

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
          $view->profilePHP(3);
          $view->calculatorPHP(3);
          $view->manualPHP(3);
        } else {
          $view->index1PHP(0);
          $view->loginPHP(3);
          $view->registerPHP(3);
          $view->recoverPHP(3);
          $view->manualPHP(3);
        }
        $view->start(2);
        ?>
        <div class="form">
            <h2>1)Adaugarea unei noi retete.</h2>
            <p>Pentru a adauga o noua reteta este necesar sa intrati <a href="newRecipe.php">aici</a>.</p>
            <img src="../../image/man1.png" width="100%">
            <p>In casuta Recipe Name va trebui sa treceti numele retetei(Ex:"clatite cu banane")</p>
            <p>Pentru a adauga un ingredient aceste retete , este necesar sa puneti numele ingredientului, cantitatea si unitatea de masura in a 2-a linie din tabel,iar apoi apasati pe butonul "Add Ingredient".(ex:"Apa,2,Litri")</p>
            <p>Noul ingredient va aparea in tabel, cu posibilitatea de a-l sterge din lista.</p>
            <p>La final , pentru a da submit retetei, apasati pe butonul "Add Recipe" din josul paginii.</p>
        </div>
</body>
</html>