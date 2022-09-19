<?php

function  con_mysql(){
    $host = "localhost";
    $dbname = "db_cidadesBrasil";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname",
        $username,
        $password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET CHARACTER SET utf8mb4");

        return $conn;
    }catch(PDOException $e){
        echo 'ERROR: ' . $e->getMessage();
    }

}

?>