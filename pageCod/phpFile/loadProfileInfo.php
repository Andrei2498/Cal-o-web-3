<?php
require_once ('Database.php');

if(isset($_GET['value'])){
    $firstName ="";
    $lastname ="";
    $email ="";
    $greutate =0;
    $inaltime =0;
    $sex = "";
    $ids = selectUserId();
    $database = new Database();
    $conn= $database->OpenCon();
    $sql = "select firstname,lastname,email,inaltime,greutate,sex from profile where id = '$ids'";
    $stms = $conn->prepare($sql);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($firstName,$lastname,$email,$inaltime,$greutate,$sex);
    $stms->fetch();
    $stms->close();
    $conn->close();

    $result = array(
      'id' => $ids,
      'nume' => $firstName,
      'prenume' => $lastname,
      'email' => $email,
      'greutate' => $greutate,
      'inaltime' => $inaltime,
      'sex' => $sex
    );

    header('Content-Type:application/json');
    echo json_encode($result,JSON_PRETTY_PRINT);

}

function selectUserId(){
    $db = new Database();
    $conn = $db-> OpenCon();
    $sql = "select id_persoana from users where username = ?";
    $ids = 0;
    $stms = $conn->prepare($sql);
    $stms->bind_param("s", $_GET['value']);
    $stms->execute();
    $stms->store_result();
    $stms->bind_result($ids);
    $stms->fetch();
    $stms->close();
    $conn->close();
    return $ids;
}