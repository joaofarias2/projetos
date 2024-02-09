<?php 

// PHP irá realizar verificações rigorosas de tipos e emitir erros se houver qualquer inconsistência nos tipos de dados
declare(strict_types=1);

function is_input_empty(string $username, $password, $email){
    if(empty($username) || empty($password) || empty($email) ){
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)){
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email, $user_id = null){
    if(get_email($pdo, $email, $user_id)){
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $password, string $username, string $email){
    set_user($pdo, $password,  $username,  $email);
}



?>