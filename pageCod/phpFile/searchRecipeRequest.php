<?php
require 'Database.php';
if (isset($_GET['value'])&& strlen($_GET['value'])>2){
    $database = new Database();
    $conn= $database->OpenCon();
    $value = $_GET['value'];
    $sql = "select id,nume from retete where nume like '%$value%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$row);
    $array = [];
    $i=1;
    while($stmt->fetch()){
        $array[$i]['id']=$id;
        $array[$i]['denumire'] = $row;
        $i++;
    }
    header('Content-Type:application/json');
    echo json_encode($array,JSON_PRETTY_PRINT);
    $conn->close();

}