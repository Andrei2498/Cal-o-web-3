<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../pageCod/css/modal.css" type="text/css">
    <script src="../javascript/modal.js"></script>
</head>
<body>
<!--<button id="myBtn">Open Modal</button>-->
<!--<div id="myModal" class="modal">-->
    <div class="modal-content">
        <a class="close" href="Profile.php">&times;</a>
        <h2>Introduceti Retetele Urmate Astazi !</h2>
        <form>
            <table>
                <tr id="inputt">
                    <td>
                        <input id="recipeInput" list="recipeList" type="text" onkeyup="checkRecipe(this.value);"
                               placeholder="Recipe Name">
                        <datalist id="recipeList"></datalist>
                    </td>
                    <td>
                        Calories
                    </td>
                    <td>
                        <input type="submit" value="add" onclick="add();return false;">
                    </td>
                </tr>
            </table>
            <input type="submit" onclick="return submitRecipes();">
        </form>
<!--    </div>-->
<!--</div>-->

</body>
</html>
