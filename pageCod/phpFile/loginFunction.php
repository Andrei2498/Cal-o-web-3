<?php
include "database.php";

if(verify($_POST['username'],$_POST['password'])){
    setcookie("username",$_POST['username'],time() + (86400 * 30),"/");
    setcookie("password",$_POST['password'],time() + (86400 * 30),"/");
    setcookie("failed",null,-1,"/");
    header("Location: ../../index.php");
}else {
    setcookie("failed",1,time() + 30, "/");
    header("Location: ../page/login.php");
}
function verify($username,$password){
    $db=new database();
    $conn=$db->OpenCon();
    $sql = "SELECT username,password FROM users where username='$username' and password='$password'";
    $result =$conn->query($sql);
    if ($result->num_rows > 0)
        return true;
    else 
        return false;
}
?>