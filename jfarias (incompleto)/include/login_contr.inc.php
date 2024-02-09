<?php 

declare(strict_types=1);

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