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

    $input = json_decode($_POST["addRecipe"]);
    $sql = 'select id_persoana from users where username = ?';
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $_COOKIE['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $stmt->fetch();

    $user_id =$id;

    $sql = 'insert into retete (id,nume,id_creator) values (null,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si",$input[0]->recipeName,$user_id);
    $stmt->execute();

    $recipe_id = $conn->insert_id;

    $sql = 'insert into cantitati (id_reteta,id_produs,cantitate) value (?,?,?)';
    $stmt=$conn->prepare($sql);
    for ($i = 1 ; $i <sizeof($input);$i++){
        $stmt->bind_param("iii",$recipe_id,$input[$i]->idProdus,$input[$i]->cantitateProdus);
        $stmt->execute();
    }
    
}