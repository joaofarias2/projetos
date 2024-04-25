<?php

/* Condiçoes */ 

 function is_input_empty(string $username, $password){
    if(empty($username) || empty($password)){
        return true;
    } else {
        return false;
    }
}

function is_user_wrong($result){
    if(!$result){
        return true;
    } else {
        return false;
    }    
}

function is_password_wrong(string $password, string $hashPassword){
    if(!password_verify($password, $hashPassword)){
        return true;
    } else {
        return false;
    }    
} 

/* Login */

if ($_SERVER["REQUEST_METHOD"] != "POST"){
  
    header("location: ../login.php");
    exit;
    
}

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

try {
    require_once 'dbh.inc.php';
    require_once 'db_query.php';

    $errors=[];
    $result = get_user($pdo, $username);

    if(is_input_empty($username, $password)){
        $errors[] = "Preencha todos os campos!";
    }

    if(is_user_wrong($result)){
        $errors[] = "Dados Incorrectos!";
    }

    if(!is_user_wrong($result) && is_password_wrong($password, $result["escola_password"])){
        $errors[] = "Dados Incorrectos!";
    }
    
    session_start();
    $_SESSION['user'] = $username;
    

    if(empty($errors)){
        header("location: ../dashboard.php");
    } else {
        $encoded_errors = urlencode(implode(",", $errors));
        header("location: ../login.php?error=$encoded_errors");
        exit;
    } 
    
} catch (PDOException $e) {        
    echo "Erro: " . $e->getMessage();
    exit;
}







