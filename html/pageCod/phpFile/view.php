<?php
class view{
    function start($val){
        if($val == 0){
            echo '<div class="mybar">';
        } else {
            echo '</div>';
        }
    }
    function index1PHP($actives){
        if($actives == 0){
            echo '<a href="../../index.php">Home</a>';
        } else if($actives == 1){
            echo '<a class="active" href="index.php">Home</a>';
        } else if($actives == 2) {
            echo '<a class="active" href="../index.php">Home</a>';
        } else {
            echo '<a href="index.php">Home</a>';
        }
    }
    function loginPHP($active){
        if($active == 0){
            echo '<a href="pageCod/page/login.php">Login</a>';
        } else if($active == 1) {
            echo '<a class="active" href="./html/page/login.php">Login</a>';
        } else if($active == 2) {
            echo '<a class="active" href="login.php">Login</a>';
        } else {
            echo '<a href="login.php">Login</a>';
        }
    }
    function registerPHP($active){
        if($active == 0){
            echo '<a href="pageCod/page/Register.php">Register</a>' ;
        } else if($active == 1) {
            echo '<a class="active" href="./Register.php">Register</a>' ;
        } else if($active == 2) {
            echo '<a class="active" href="Register.php">Register</a>' ;
        } else {
            echo '<a href="Register.php">Register</a>' ;
        }
    }
    function recoverPHP($active){
        if($active == 0){
            echo '<a href="pageCod/page/RecoverPassword.php">Recover Password</a>' ;
        } else if($active == 1) {
            echo  '<a class="active" href="./RecoverPassword.php">Recover Password</a>';
        } else if($active == 2) {
            echo  '<a class="active" href="RecoverPassword.php">Recover Password</a>';
        } else {
            echo  '<a href="RecoverPassword.php">Recover Password</a>';
        }
    }
    function manualPHP($active){
        if($active == 0){
            echo '<a href="pageCod/page/manual.php">User Manual</a>' ;
        } else if($active == 1) {
            echo '<a class="active" href="./manual.php">User Manual</a>' ;
        } else if($active == 2) {
            echo '<a class="active" href="manual.php">User Manual</a>' ;
        } else {
            echo '<a href="manual.php">User Manual</a>' ;
        }
    }
    function addNewPHP($active){
        if($active == 0){
            echo '<a href="pageCod/page/newRecipe.php">Add New Recipe</a>' ;
        } else if($active == 1) {
            echo '<a class="active" href="./newRecipe.php">Add New Recipe</a>' ;
        } else if($active == 2) {
            echo '<a class="active" href="newRecipe.php">Add New Recipe</a>' ;
        } else {
            echo '<a href="newRecipe.php">Add New Recipe</a>' ;
        }
    }
    function calculatorPHP($active){
        if($active == 0){
            echo  '<a href="pageCod/page/calculator.php">Calories Calculator</a>';
        } else if($active == 1) {
            echo  '<a class="active" href="./calculator.php">Calories Calculator</a>';
        } else if($active == 2) {
            echo  '<a class="active" href="calculator.php">Calories Calculator</a>';
        } else {
            echo  '<a href="calculator.php">Calories Calculator</a>';
        }
    }
    function profilePHP($active){
        if($active == 0){
            echo '<a href="pageCod/page/Profile.php">Profile</a>' ;
        } else if($active == 1) {
            echo '<a class="active" href="./Profile.php">Profile</a>' ;
        } else if($active == 2) {
            echo '<a class="active" href="Profile.php">Profile</a>' ;
        } else {
            echo '<a href="Profile.php">Profile</a>' ;
        }
    }
}
?>