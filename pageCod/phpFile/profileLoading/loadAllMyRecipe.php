<?php
require_once ('../Database.php');

if(isset($_GET['value'])  && isset($_COOKIE['username'])){
    echo getOtherRecipe($_GET['value']);
} else {
    header('Location: ../index.php');
}
function getOtherRecipe($arg){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select r.nume,r.val_cal from retete r  where id_creator = ?";
    $ids = 0;
    $nums = "";
    $datas = "";
    $stms = $conn->prepare($sql);
    $stms->bind_param("i",$arg);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($nums,$ids);
    $array = [];
    $i = 1;
    while ($stms->fetch()){
        $array[$i]['nume']=$nums;
        $array[$i]['valoare'] = $ids;
        $i++;
    }
    $stms->close();
    $conn->close();
    header('Content-Type:application/json');
    echo json_encode($array,JSON_PRETTY_PRINT);
}
