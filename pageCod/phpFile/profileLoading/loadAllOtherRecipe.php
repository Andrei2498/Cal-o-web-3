<?php
require_once ('../Database.php');

if(isset($_GET['value'])){
    echo getOtherRecipe($_GET['value']);
}

function getOtherRecipe($arg){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select r.nume,r.val_cal,ru.data_urm from retete_urmate ru join retete r on ru.id_reteta = r.id where id_persoana = ?";
    $ids = 0;
    $nums = "";
    $datas = "";
    $stms = $conn->prepare($sql);
    $stms->bind_param("i",$arg);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($nums,$ids,$datas);
    $array = [];
    $i = 1;
    while ($stms->fetch()){
        $array[$i]['nume']=$nums;
        $array[$i]['valoare'] = $ids;
        $array[$i]['data'] = $datas;
        $i++;
    }
    $stms->close();
    $conn->close();
    header('Content-Type:application/json');
    echo json_encode($array,JSON_PRETTY_PRINT);
}