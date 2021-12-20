<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'cinema_db');

    function open_database(){
        $conn = new mysqli(HOST,USER,PASS,DB);
        
        if($conn->connect_error){
            die('Can not connect to database'. $conn->connect_error);
        }
        return $conn;
    }
?>