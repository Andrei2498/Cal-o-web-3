<!DOCTYPE html>
<html lang="EN">
<head>
    <title>New Recipe</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo.png"/>
    <link rel="stylesheet" type="text/css" href="../pageCod/css/newRecipe.css?version=51">
    <script src="../javascript/newRecipe.js"></script>
</head>
<body>

<header>
    <img src="../image/banner-2.0.png" alt="Big-Logo">
</header>
<?php
include "../pageCod/phpFile/view.php";
$view = new view();
$view->start(0);
if (isset($_COOKIE['username'])) {
    $view->index1PHP(0);
    $view->addNewPHP(2);
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
<div class="form">
    <h2>Add New Recipe</h2>
    <form method="post" action="newRecipe.php">
        <input name="RecipeName" placeholder="Recipe Name" type="text"/>
        <div class="ingredients">
            <table id="ingredientsTable">
                <tr>
                    <th>ingredient</th>
                    <th>cantitate</th>
                    <th>Unitate Masura</th>
                    <th>Action</th>

                </tr>
                <tr id="input">
                    <td>
                        <input name="ingredientName" id="findIngredient" list="json-find"
                               onkeyup="searchResult(this.value);" placeholder="Ingredient" type="text"/>
                        <datalist id="json-find"></datalist>
                    </td>
                    <td><input name="ingredientQuantity" placeholder="Quantity" type="number" min="1"/></td>
                    <td><input name="ingredientMeasurement" id="measure" placeholder="Measurement Unit" type="text"/></td>
                    <td><input type="submit" value="Add Ingredient" name="addIngredient"
                               onclick="addNewLine();return false;"/></td>
                </tr>
            </table>
            <p id="calorii">Total Calories: 0</p>
        </div>
        <input type="submit" value="Add Recipe" name="AddRecipe"/>
    </form>
</div>

</body>


<?php
if (isset($_POST['AddRecipe'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'NumeIngredient') === 0) {
            echo '<script>console.log("' . $value . '")</script>';
        }
    }
}
?>
</html>