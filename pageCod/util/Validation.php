<?php
class Validation{
    function verifyName($username)
    {
        return ctype_alpha($username);
    }

    function verifyEmail($email){
        if(strpos($email, '@') === false){
            return false;
        }
        
        return true;
    }

    function verifySetData($username, $password, $repassword, $firstname, $lastname, $email){
        if(empty($username) || empty($password) || empty($repassword)
            || empty($firstname) || empty($lastname) || empty($email)){
            return false;
        }
        return true;
    } 
}
?>