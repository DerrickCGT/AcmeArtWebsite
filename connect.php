<?php

function connect() {
    $host = 'localhost';
    $db = 'at2_sprint_1';
    $user = 'root';
    $password = '';
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
    try {
        return new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        
    }
}
