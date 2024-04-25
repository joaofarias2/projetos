<?php 

declare(strict_types=1);

function get_user(object $pdo, string $username){
    $query = "SELECT * FROM tbl_utilizadores WHERE user_name = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_by_id(object $pdo, string $id){
    $query = "SELECT * FROM tbl_utilizadores WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_role(object $pdo, string $username){
    $query = "SELECT user_id, user_name, user_password, user_role, user_pic FROM tbl_utilizadores WHERE user_name = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_user(object $pdo, int $userId, string $name, string $morada, string $telefone, string $email, $img){
    $stmt = $pdo->prepare("UPDATE tbl_utilizadores SET user_nome_completo = '$name', user_morada = '$morada', user_telefone = '$telefone', user_email = '$email', user_pic = '$img' WHERE user_id = '$userId'");
    $stmt->execute();

    return true;
}
       


