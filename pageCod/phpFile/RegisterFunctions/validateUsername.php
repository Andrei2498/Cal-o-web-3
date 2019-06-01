<?php
require '../Database.php';
require  '../../util/config.php';

function verifyUsername($user){
    $databased = new Database();
    $conn1= $databased->OpenCon();
    $sql = "SELECT id_persoana FROM users WHERE username = ?";
    $ids = 0;
    $stmt = $conn1->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ids);
    $stmt->fetch();
    $stmt->close();
    if($ids > 0){
        setcookie("ExistaDeja", '<p ' . ERROR_MESSAGE . '>Acest username deja exista</p>', time() + 3,"/");
        $conn1->close();
        return false;
    } else {
        $conn1->close();
        return true;
    }

}
?>
