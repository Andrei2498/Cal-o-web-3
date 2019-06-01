<?php
require_once '../Database.php';
require_once '../../util/config.php';
function verifyUsername($user){
    $db=new Database();
    $conn=$db->OpenCon();
    $sql = "SELECT count(*) FROM users WHERE username = ?";
    $ids = 0;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($ids);
    $stmt->fetch();
    $stmt->close();
    echo $ids;
}
?>
