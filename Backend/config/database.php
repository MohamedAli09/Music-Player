<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'database');

// Create a PDO connection to the database
try{
    
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    
    
}catch(PDOException $e){

    echo "Faild to connect ";
    
}









?>