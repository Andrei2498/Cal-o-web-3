<?php
require '../../util/Validation.php';
require '../../util/config.php';
require_once '../Database.php';
require 'validateUsername.php';
if( verify($_POST['Username'], $_POST['password'], $_POST['re-password'],$_POST['FirstName'],$_POST['LastName'],$_POST['Email'])){
    setcookie("username", $_POST['Username'], time() + (86400 * 30), "/");
    setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
    setcookie("firstname", $_POST['FirstName'], time() + (86400 * 30), "/");
    setcookie("lastname", $_POST['LastName'], time() + (86400 * 30), "/");
    setcookie("email", $_POST['Email'], time() + (86400  * 30), "/");
    setcookie("failed", null, -1, "/");
    header("Location: ../../../index.php");
} else {
    header( "Location: ../../../page/Register.php");
}

function verify($username, $password,$repassword,$firstname,$lastname,$email)
{
    return true;
}
?>