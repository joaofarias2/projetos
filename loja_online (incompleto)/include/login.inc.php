<?php

require_once __DIR__ . '/../Classes/Dbh.php';
require_once __DIR__ . '/../Classes/Auth.php';

$auth = new Auth($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$auth->login($username, $password)) {        
        echo json_encode(["success" => false, "error" => "Invalid username or password"]);
        exit();            
    } 

    echo json_encode(["success" => true ]);
    
}