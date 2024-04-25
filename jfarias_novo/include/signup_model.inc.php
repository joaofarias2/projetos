<?php 

// PHP irá realizar verificações rigorosas de tipos e emitir erros se houver qualquer inconsistência nos tipos de dados
declare(strict_types=1);


function get_username(object $pdo, string $username){
    $query = "SELECT user_name FROM tbl_utilizadores WHERE user_name = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email, $user_id = null){

    if($user_id > 0){
        $query = "SELECT user_email FROM tbl_utilizadores WHERE user_email = '$email' AND user_id != $user_id";
    } else {
        $query = "SELECT user_name FROM tbl_utilizadores WHERE user_email = '$email'";
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}


function set_user(object $pdo, string $password, string $username, string $email){
    $query = "INSERT INTO tbl_utilizadores (user_name, user_password, user_email)  VALUES  (:username, :password, :email)";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12 
    ];

    $hashedpwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedpwd);
    $stmt->bindParam(":email", $email);
    
    $stmt->execute();
}



?>