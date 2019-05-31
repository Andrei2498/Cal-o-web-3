<?php
include "database.php";
require '../util/Validation.php';
if( verify($_POST['Username'], $_POST['password'], $_POST['re-password'],$_POST['FirstName'],$_POST['LastName'],$_POST['Email'])){
    setcookie("username", $_POST['Username'], time() + (86400 * 30), "/");
    setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
    setcookie("firstname", $_POST['FirstName'], time() + (86400 * 30), "/");
    setcookie("lastname", $_POST['LastName'], time() + (86400 * 30), "/");
    setcookie("email", $_POST['Email'], time() + (86400 * 30), "/");
    setcookie("failed", null, -1, "/");
    // header("Location: ../../index.php");
} else {
    header( "Location: ../page/Register.php");
}

function verify($username, $password,$repassword,$firstname,$lastname,$email)
{
    $test = new Validation();

    if(!$test-> verifySetData($_POST['Username'], $_POST['password'],
         $_POST['re-password'], $_POST['FirstName'], $_POST['LastName'], $_POST['Email'])){
        setcookie("ExistaDeja", "<p style='    color: #46485c;
                        font-size: 15px;
                        font-weight: 600;
                        text-align: center;
                        margin-bottom: 10px;
                        color: red;'>Completati toate campurile</p>", time() + 3, "/");
        return false;
    }

    if($password != $repassword){
        setcookie("ExistaDeja","<p style='color:red'>Parolele difera</p>",time() + 3, "/");
        return false;
    }

    $db = new database();
    $conn = $db->OpenCon();

    if($test->checkIfAlreadyExist($username,$conn)){
        setcookie("ExistaDeja", '<p style="color:red;">Acest username deja exista</p>', time() + 3,"/");
        return false;
    }

    if(!$test->verifyName($firstname)){
        setcookie("ExistaDeja", '<p style="color:red;">Numele contine caractere interzise</p>', time() + 3, "/");
        return false;
    }

    if(!$test->verifyName($lastname)){
        setcookie("ExistaDeja", '<p style="color:red;">Prenumele contine caractere interzise</p>', time() + 3, "/");
        return false;    
    }

    if(!$test->verifyEmail($email)){
        setcookie("ExistaDeja", '<p style="color:red;">Emailul nu are forma corecta</p>', time() + 3, "/");
        return false;    
    }

    $conn->close();
}


?>