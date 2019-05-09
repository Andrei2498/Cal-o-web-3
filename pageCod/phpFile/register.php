<?php
include "database.php";

if( verify($_POST['username'], $_POST['password'], $_POST['re-password'],$_POST['firstname'],$_POST['lastname'],$_POST['email'])){
    setcookie("username", $_POST['username'], time() + (86400 * 30), "/");
    setcookie("password", $_POST['password'], time() + (86400 * 30), "/");
    setcookie("firstname", $_POST['firstname'], time() + (86400 * 30), "/");
    setcookie("lastname", $_POST['lastname'], time() + (86400 * 30), "/");
    setcookie("email", $_POST['email'], time() + (86400 * 30), "/");
    setcookie("failed", null, -1, "/");
    header("Location: ../../index.php");
} else {
    header( "Location: ../page/Register.php");
}

function verify($username, $password,$repassword,$firstname,$lastname,$email)
{
    if($password != $repassword){
        return false;
    }
    $db = new database();
    $conn = $db->OpenCon();
    $sql = "SELECT username FROM users where username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return false;
    else {
        if(strlen($firstname) < 6 || strlen($lastname) < 6 || strlen($email) < 15){
            return false;
        } else {
            $sql = "INSERT INTO `profile`(`firstname`, `lastname`, `email`, `inaltime`, `greutate`, `varsta`, `sex`) VALUES ('$firstname','$lastname','$email',0,0,'-')";
            $result = $conn->query($sql);
            $sql = "SELECT firstname,lastname,email,inaltime,greutate,varsta,sex from profile where firstname='$firstname' and lastname='$lastname' and email='$email'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return true;
            } else {
                return false;
            }
        }
    }
}
?>