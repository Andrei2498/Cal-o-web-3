<?php
require_once ('../Database.php');

if(isset($_GET['value'])){
    echo getOtherRecipe(intval($_GET['value']));
}

function getOtherRecipe($arg){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select count(*) from retete_urmate where id_persoana = ?";
    $ids = 0;
    $stms = $conn->prepare($sql);
    $stms->bind_param('i',$arg);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($ids);
    $stms->fetch();
    $stms->close();
    $conn->close();
    return $ids;
}