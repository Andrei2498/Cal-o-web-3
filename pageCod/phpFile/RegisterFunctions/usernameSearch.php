<?php
include_once 'validateUsername.php';
if(isset($_GET['value']) && strlen($_GET['value']) > 5){
    return verifyUsername($_GET['value']);
} else {
    return 0;
}