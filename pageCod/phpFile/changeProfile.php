<?php
require_once ('Database.php');
if(isset($_POST['Inaltime']) && isset($_POST['Greutate']) && isset($_POST['Varsta']) && isset($_COOKIE['username'])){
    updateInformation($_POST['Inaltime'],$_POST['Greutate'],$_POST['Varsta'],getId($_COOKIE['username']));
    header("Location: ../../page/Profile.php");
} else {
    header("Location: ../../../index.php");
}

function getId($username){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select id_persoana from users where username = ?";
    $ids = 0;
    $stms = $conn->prepare($sql);
    $stms->bind_param('s',$username);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($ids);
    $stms->fetch();
    $stms->close();
    $conn->close();
    return $ids;
}

function updateInformation($inaltime,$greutate,$varsta,$userID){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "UPDATE profile SET inaltime = ? , greutate = ?, varsta = ? WHERE id = ?";
    $stms = $conn->prepare($sql);
    $stms->bind_param("iiii",$inaltime,$greutate,$varsta,$userID);
    $stms->execute();
    $stms->close();
    $conn->close();
}