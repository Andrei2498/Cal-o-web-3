<?php
class Validation{
    function checkIfAlreadyExist($username, $database)
    {
        $sqlQuery = "select count(*) from users where username = ? ";
        $statement = $database->prepare($sqlQuery);
        $statement->bind_param(1, $username);
        $statement->execute();
        
        if($statement != NULL) {
            return true;
        }
        return false;
    }

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