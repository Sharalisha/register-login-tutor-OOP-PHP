<?php
    define("DB_SERVER", "localhost");   //database server
    define("DB_USER", "root");  
    define("DB_PASS", "");
    define("DB_NAME", "digitaltutor"); /*Name of the database (digitaltutor) accessed is defined*/


    function db_connect(){
        $connect = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);    //create the object $connection
    
        if ($connect->connect_errno > 0) {      //if there is a failure in connecting to database it would echo connection failed with the error
            die("Connection failed: " . $connect->connect_errno);
        }
        return $connect;  //if there is no failure in connecting tit would the connection
    }
?>