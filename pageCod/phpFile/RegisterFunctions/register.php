<?php
require '../../util/Validation.php';
require '../../util/config.php';
require_once '../Database.php';
require 'validateUsername.php';

setcookie("username", $_POST['Username'], time() + (86400 * 30), "/");
setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
setcookie("firstname", $_POST['FirstName'], time() + (86400 * 30), "/");
setcookie("lastname", $_POST['LastName'], time() + (86400 * 30), "/");
setcookie("email", $_POST['Email'], time() + (86400  * 30), "/");

header("Location: ../../../page/completeProfile.php");

?>