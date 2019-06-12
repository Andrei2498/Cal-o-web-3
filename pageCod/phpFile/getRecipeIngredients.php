<?php
require_once ('Database.php');

if(isset($_GET['value'])){
//    echo getOtherRecipe($_GET['value']);
//    echo getIdRecipe($_GET['value']);
    echo getOtherRecipe(getIdRecipe($_GET['value']));
}

function getOtherRecipe($arg){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select p.nume,p.valoare_calorica,c.cantitate from cantitati c join produse p on c.id_produs = p.id where id_reteta = ?";
    $nume = '';
    $valCal = 0;
    $cant = 0;
    $stms = $conn->prepare($sql);
    $stms->bind_param("i",$arg);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($nume,$valCal,$cant);
    $array = [];
    $i = 1;
    while ($stms->fetch()){
        $array[$i]['nume']=$nume;
        $array[$i]['valoare'] = $valCal;
        $array[$i]['cantitate'] = $cant;
        $i++;
    }
    $stms->close();
    $conn->close();
    header('Content-Type:application/json');
    echo json_encode($array,JSON_PRETTY_PRINT);
}

function getIdRecipe($valuare){
    $db = new Database();
    $conn = $db->OpenCon();
    $sql = "select id from retete where nume = ?";
    $rez = 0;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$valuare);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($rez);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return $rez;
}