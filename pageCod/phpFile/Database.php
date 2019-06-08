<?php

class Database {

    /**
     * Database constructor.
     */
    public function __construct()
    {
    }

    public function OpenCon()
    {
        $dbhost = "remotemysql.com";
        $dbuser = "VsgBUI16x6";
        $dbpass = "8j8MBn8mUw";
        $db = "VsgBUI16x6";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        
        return $conn;
    }
}
?>