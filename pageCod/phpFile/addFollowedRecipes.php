<?php
require 'Database.php';
$database = new database();
$conn = $database->OpenCon();
if (isset($_POST["addFollowedRecipes"]) && !empty($_POST["addFollowedRecipes"])) {

    $data =date("Y-m-d H:i:s");
    $sql = 'select id_persoana from users where username = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_COOKIE['username']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id);
    $stmt->fetch();
    $id_persoana =$id;
    $input = $_POST["addFollowedRecipes"];
    $array = json_decode($input);
    $sql = 'insert into retete_urmate (id_reteta,id_persoana,data_urm) values (?,?,?)';
    $stmt = $conn->prepare($sql);
    foreach ($array as $value){
        $stmt->bind_param("iis",$value,$id_persoana,$data);
        $stmt->execute();
        echo $conn->error;
    }
}