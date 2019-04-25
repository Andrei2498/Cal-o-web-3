<!DOCTYPE html>
<html lang="EN">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="../../image/logo.png" />
        <link rel="stylesheet" type="text/css" href="../css/calculator.css">
        <title>
            Calculator
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
                $view->profilePHP(3);
                $view->calculatorPHP(3);
                $view->manualPHP(3);
            } else {
                setcookie("accesinterzis",1,time() + 3,"/");
                header("Location: ../../index.php");
            }
            $view->start(2);
        ?>
        <div class="calculator">
            <h2>Calories calculator</h2>
            <input name="recipeName" placeholder="Name of the Recipe" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Name of the Recipe'"/>
            <div class="ingredient">
                <p style="width:200px">Apa</p>
                <input style="width: 50px" name="quantiy" placeholder="Quantity" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Quantity'"/>
                <input style="width:25px" name="measurement" placeholder="Unit" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Unit'"/>
                <i>500 Calories</i>
                <input style="margin-left:30px" type="submit" value="Edit"/>
                <input type="submit" value="Remove"/>
            </div>
            <div class="ingredient" >
                <p style="width:200px">Apa</p>
                <p>1</p>
                <p>L</p>
                <i style="margin-left:80px">500 Calories</i>
                <input style="margin-left:32px" type="submit" value="Edit"/>
                <input type="submit" value="Remove"/>
            </div>
            <div class="ingredient1">
                <ul>
                    <li>
                            <input style="width:200px" name="Ingredient" placeholder="Name of ingredient" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Name of ingredient'">
                    </li>
                    <li style="margin-left:40px">
                            <input style="width: 50px" name="quantiy" placeholder="Quantity" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Quantity'"/>
                    </li>
                    <li style="margin-left:40px">
                            <input style="width:25px" name="measurement" placeholder="Unit" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Unit'"/>
                    </li>
                   
                    <li>
                        <div class="addingredient">
                        <input type="submit" value="Add Ingredient" />
                        </div>
                    </li>
                </ul>
                <ul>
                    <li>
                        <i>Number of ingredients:</i>
                    </li>
                    <li>
                        <i>2</i>
                    </li>
                    <li>
                        <i> Total amount of calories: </i>
                    </li>
                    <li>
                        <i style="margin-left:50px">1000 Calories</i>
                    </li>
                </ul>
                <!-- <input style="width:200px" name="Ingredient" placeholder="Name of ingredient" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Name of ingredient'">
                <input style="width: 50px" name="quantiy" placeholder="Quantity" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Quantity'"/>
                <input style="width:25px" name="measurement" placeholder="Unit" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Unit'"/>
                <div class="addingredient">
                <input type="submit" value="Add Ingredient" />
                </div> -->
            </div>
            
        </div>
    </body>
</html>