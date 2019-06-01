<?php
require '../util/Validation.php';
require '../util/config.php';
require 'database.php';
if( verify($_POST['Username'], $_POST['password'], $_POST['re-password'],$_POST['FirstName'],$_POST['LastName'],$_POST['Email'])){
//    setcookie("username", $_POST['Username'], time() + (86400 * 30), "/");
//    setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
//    setcookie("firstname", $_POST['FirstName'], time() + (86400 * 30), "/");
//    setcookie("lastname", $_POST['LastName'], time() + (86400 * 30), "/");
//    setcookie("email", $_POST['Email'], time() + (86400 * 30), "/");
    setcookie("failed", null, -1, "/");
    header("Location: ../../index.php");
} else {
    header( "Location: ../../page/Register.php");
}

function verify($username, $password,$repassword,$firstname,$lastname,$email)
{
    $test = new Validation();

    if(!$test-> verifySetData($_POST['Username'], $_POST['password'],
         $_POST['re-password'], $_POST['FirstName'], $_POST['LastName'], $_POST['Email'])){
        setcookie("ExistaDeja", "<p " . ERROR_MESSAGE . " >Completati toate campurile</p>", time() + 3, "/");
        return false;
    }

    if($password != $repassword){
        setcookie("ExistaDeja","<p " . ERROR_MESSAGE . ">Parolele difera</p>",time() + 3, "/");
        return false;
    }

    $database = new database();
    $conn= $database->OpenCon();
    $sql = "SELECT id_persoana FROM users WHERE username = ?";
    $ids = 0;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ids);
    $stmt->fetch();
    $stmt->close();
    if($ids > 0){
        setcookie("ExistaDeja", '<p ' . ERROR_MESSAGE . '>Acest username deja exista</p>', time() + 3,"/");
        return false;
    } else {
        return true;
    }
    $conn->close();

    if(!$test->verifyName($firstname)){
        setcookie("ExistaDeja", '<p ' . ERROR_MESSAGE . '>Numele contine caractere interzise</p>', time() + 3, "/");
        return false;
    }

    if(!$test->verifyName($lastname)){
        setcookie("ExistaDeja", '<p ' . ERROR_MESSAGE . '>Prenumele contine caractere interzise</p>', time() + 3, "/");
        return false;    
    }

    if(!$test->verifyEmail($email)){
        setcookie("ExistaDeja" , '<p ' . ERROR_MESSAGE . '>Emailul nu are forma corecta</p>', time() + 3, "/");
        return false;    
    }

}
?>