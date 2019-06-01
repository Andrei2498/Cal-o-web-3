<?php
class Validation{
    function checkIfAlreadyExist($username, $database)
    {
//        $sqlQuery = "select * from users where username = ? ";
//        $statement = $database->prepare($sqlQuery);
//        $statement->bind_param("s", $username);
//        $statement->execute();
//
//
//        if($statement->num_row != NULL) {
//            return true;
//        }
//        return false;
        $query = 'SELECT id_perosana FROM users WHERE username = ?';
        $id = 5;

        if($stmt = $database->prepare($query)){
            /*
                 Binds variables to prepared statement

                 i    corresponding variable has type integer
                 d    corresponding variable has type double
                 s    corresponding variable has type string
                 b    corresponding variable is a blob and will be sent in packets
            */
            $stmt->bind_param('s',$username);

            /* execute query */
            $stmt->execute();

            /* Store the result (to get properties) */
            $stmt->store_result();

            /* Get the number of rows */
            $num_of_rows = $stmt->num_rows;

            $id_persoana = 0;
            /* Bind the result to variables */
            $stmt->bind_result($id_persoana);

            if ($stmt->fetch()) {
                echo '<script>console.log("' . $id_persoana . '")</script>';
            }

            $stmt->free_result();
            $stmt->close();

            if($id_persoana > 0) {
                return true;
            } else {
                return false;
            }

        }
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