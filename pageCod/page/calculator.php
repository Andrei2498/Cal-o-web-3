<!DOCTYPE html>
<html lang="EN">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../../image/logo.png"/>
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
$view = new view();
$view->start(0);
if (isset($_COOKIE['username'])) {
    $view->index1PHP(0);
    $view->addNewPHP(3);
    $view->profilePHP(3);
    $view->calculatorPHP(3);
    $view->manualPHP(3);
    $view->logout(0);
} else {
    setcookie("accesinterzis", 1, time() + 3, "/");
    header("Location: ../../index.php");
}
$view->start(2);
?>
<div class="calculator">
    <h2>Calories calculator</h2>
    <div class="RecipeName">
        <input name="recipeName" placeholder="Name of the Recipe" type="text" onfocus="this.placeholder=''"
               onblur="this.placeholder='Name of the Recipe'"/>
    </div>

    <div class="tabela">
        <table id="tabelaIngrediente">
            <tr>
                <th>Ingredient</th>
                <th>Cantitate</th>
                <th>Calories</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr>
                <td><input name="ingredientName" placeholder="Ingredient" type="text"/></td>
                <td><input name="ingredientQuantity" placeholder="Quantity" type="text"/></td>
                <td><input name="ingredientMeasurement" placeholder="Calories" type="text" readonly/></td>
                <td><input type="submit" value="Edit"/></td>
                <td><input type="submit" value="Delete"/></td>
            </tr>
            <tr>
                <td>Apa</td>
                <td>2</td>
                <td>500 calories</td>
                <td><input type="submit" value="Edit"/></td>
                <td><input type="submit" value="Delete"/></td>
            </tr>
        </table>
    </div>
    <div class="ingredient1" id="AddIngredient">
        <ul>
            <li>
                <input style="width:200px" name="Ingredient" placeholder="Name of ingredient" type="text"
                       onfocus="this.placeholder=''" onblur="this.placeholder='Name of ingredient'">
            </li>
            <li style="margin-left:40px">
                <input style="width: 50px" name="Quantity" placeholder="Quantity" type="text"
                       onfocus="this.placeholder=''" onblur="this.placeholder='Quantity'"/>
            </li>
            <li style="margin-left:40px; margin-top:20px;">
                <i> Grams </i>
                <!-- <input style="width:25px" name="measurement" placeholder="Unit" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Unit'"/> -->
            </li>

            <li>
                <div class="addingredient">
                    <!-- <input type="submit" name="Button" value="Add Ingredient" /> -->
                    <input type="submit" name="Button" onclick="addNewLine(); return false;"/>
                </div>
            </li>
        </ul>
    </div>
    <div class="ingredient1">
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
    </div>

    <!-- <input style="width:200px" name="Ingredient" placeholder="Name of ingredient" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Name of ingredient'">
    <input style="width: 50px" name="quantiy" placeholder="Quantity" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Quantity'"/>
    <input style="width:25px" name="measurement" placeholder="Unit" type="text" onfocus="this.placeholder=''" onblur="this.placeholder='Unit'"/>
    <div class="addingredient">
    <input type="submit" value="Add Ingredient" />
    </div> -->
</div>
</body>
<script>

    function addNewLine() {
        var ingredientName = document.getElementsByName("Ingredient")[0];
        var ingredientQuantity = document.getElementsByName("Quantity")[0];
        var row = document.createElement('tr');
        var name = document.createElement('td');
        var quantity = document.createElement('td');
        var count = document.createElement('td');
        var buttonE = document.createElement('td');
        var buttonD = document.createElement('td');
        var buttonEdit = document.createElement('input');
        buttonEdit.type = "submit";
        buttonEdit.value = "Edit";
        var buttonDelete = document.createElement('input');
        buttonDelete.type = "submit";
        buttonDelete.value = "Delete";
        // buttonDelete.onclick = ev => {
        //     deleteLine();
        //     return false;
        // };
        buttonE.append(buttonEdit);
        buttonD.append(buttonDelete);
        name.innerText = ingredientName.value;
        quantity.innerText = ingredientQuantity.value;
        count.innerText = "sds";
        row.appendChild(name);
        row.appendChild(quantity);
        row.appendChild(count);
        row.appendChild(buttonE);
        row.appendChild(buttonD);
        document.getElementById('tabelaIngrediente').appendChild(row);
    }
</script>
</html>