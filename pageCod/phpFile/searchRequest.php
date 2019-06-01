<?php
require 'Database.php';
if (isset($_GET['value'])&& strlen($_GET['value'])>2){
    $database = new database();
    $conn= $database->OpenCon();
    $value = $_GET['value'];
    $sql = "select nume from produse where nume like '%$value%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($row);
    $array = [];
    $i=1;
    while($stmt->fetch()){
        $array[$i]['nume'] = $row;
        $i++;
    }
    header('Content-Type:application/json');
    echo json_encode($array,JSON_PRETTY_PRINT);
    $conn->close();

}