<!DOCTYPE html>
<html lang="EN">
    <head>
        <title>New Recipe</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../image/logo.png" />
        <link rel="stylesheet" type="text/css" href="../css/newRecipe.css">
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
                    setcookie("accesinterzis",1,time() + 3,"/");
                    header("Location: ../../index.php");
                }
                $view->start(2);
            ?>
            <div class="form">
                    <h2>Add New Recipe</h2>
                    <input name="RecipeName" placeholder="Recipe Name" type="text"/>
                    <div class="ingredients">
                        <table>
                        <tr>
                            <th>ingredient</th>
                            <th>cantitate</th>
                            <th>Unitate Masura</th>
                            <th>Action</th>
                            
                        </tr>
                        <tr>
                            <td><input name="ingredientName" placeholder="Ingredient" type="text"/></td>
                            <td><input name="ingredientQuantity" placeholder="Quantity" type="text"/></td>
                            <td><input name="ingredientMeasurement" placeholder="Measurement Unit" type="text"/></td>
                            <td><input type="submit" value="Add Ingredient"/></td>
                        </tr>
                        <tr>
                            <td>Apa</td>
                            <td>2</td>
                            <td>Litri</td>
                            <td><input type="submit" value="delete"/></td>
                        </tr>
                        </table>
                        <p>Total Calories:<a>0</a></p>
                    </div>
                    <input type="submit" value="Add Recipe"/>
                </div>
    </body>
</html>