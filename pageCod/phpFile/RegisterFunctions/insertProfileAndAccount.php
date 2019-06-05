<?php
require_once ('../Database.php');

if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['firstname'])
    && isset($_COOKIE['lastname']) && isset($_COOKIE['email']) && isset($_POST['Inaltime']) && isset($_POST['Greutate'])
    && isset($_POST['Varsta']) && isset($_POST['Gen'])){

    insertUser();
    $aux = selectUserId();
    insertCont($aux);
    setcookie("username", null, -1, "/");
    setcookie("password", null, -1,"/");
    setcookie("firstname", null, -1, "/");
    setcookie("lastname", null, -1, "/");
    setcookie("email", null, -1, "/");
    header("Location: ../../../page/login.php");
} else {
    setcookie("username", null, -1, "/");
    setcookie("password", null, -1,"/");
    setcookie("firstname", null, -1, "/");
    setcookie("lastname", null, -1, "/");
    setcookie("email", null, -1, "/");
    header("Location: ../../../page/Register.php");
    echo "asdasdasd";
}

function selectUserId(){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select id from profile where firstname = ? and lastname = ? and email = ? and  inaltime = ? and greutate = ? and varsta = ? and sex = ?";
    $ids = 0;
    $stms = $conn->prepare($sql);
    $stms->bind_param("sssiiis",$_COOKIE['firstname'],
        $_COOKIE['lastname'],$_COOKIE['email'],$_POST['Inaltime'],
        $_POST['Greutate'],$_POST['Varsta'],$_POST['Gen']);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($ids);
    $stms->fetch();
    $stms->close();
    $conn->close();
    return $ids;
}

function insertUser(){
    $db = new Database();
    $conn = $db->OpenCon();
    $sql = "INSERT INTO profile (firstname, lastname, email, inaltime, greutate, varsta, sex) VALUES (?,?,?,?,?, ? , ?)";
    $stms = $conn->prepare($sql);
    $stms->bind_param("sssiiis",$_COOKIE['firstname'],
        $_COOKIE['lastname'],$_COOKIE['email'],$_POST['Inaltime'],
        $_POST['Greutate'],$_POST['Varsta'],$_POST['Gen']);
    if($stms->execute()){
        echo "a mers bine";
        $stms->close();
        $conn->close();
    } else {
        echo $conn->connect_error;
        $stms->close();
        $conn->close();
    }
}

function insertCont($idPers){
    $db = new Database();
    $conn = $db->OpenCon();
    $sql = "INSERT INTO users (id_persoana, username, password) VALUES (?,?,?)";
    $stms = $conn->prepare($sql);
    $stms->bind_param("iss",$idPers,$_COOKIE['username'],$_COOKIE['password']);
    if($stms->execute()){
        echo "a mers bine";
        $stms->close();
        $conn->close();
    } else {
        echo $conn->connect_error;
        $stms->close();
        $conn->close();
    }
}