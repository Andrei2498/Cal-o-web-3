<?php
require 'Database.php';
$database = new database();
$conn = $database->OpenCon();

if (isset($_GET['value']) && strlen($_GET['value']) > 2) {
    $value = $_GET['value'];
    $sql = "select id,nume,valoare_calorica from produse where nume like '%$value%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $nume, $valoare);
    $array = [];
    $i = 1;
    while ($stmt->fetch()) {
        $array[$i]["id"] = $id;
        $array[$i]["nume"] = $nume;
        $array[$i]["valoare"] = $valoare;
        $i++;
    }
    header('Content-Type:application/json');
    echo json_encode($array, JSON_PRETTY_PRINT);
    $conn->close();

}
if (isset($_POST["addRecipe"]) && !empty($_POST["addRecipe"])) {
    $sql = 'select id from users where username =?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$_COOKIE['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $stmt->fetch();
    echo $id;
}