<?php

declare(strict_types=1);

function get_user(object $pdo, string $username){
    $query = "SELECT * FROM tbl_escolas WHERE escola_username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function create_atividade(object $pdo, string $tipo_atividade, string $titulo, string $data_inicio, string $data_fim, string $descricao, string $roteiro, int $user_id){
    $query = "INSERT INTO tbl_atividades (tipo_atividade, titulo_atividade, inicio_atividade, termino_atividade, descricao_atividade, roteiro_atividade, atividade_escola_id) VALUES (:tipo_atividade, :titulo, :data_inicio, :data_fim, :descricao, :roteiro, :user_id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tipo_atividade", $tipo_atividade);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":data_inicio", $data_inicio);
    $stmt->bindParam(":data_fim", $data_fim);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":roteiro", $roteiro);
    $stmt->bindParam(":user_id", $user_id);

    $stmt->execute();
}


function edit_atividade(object $pdo, string $tipo_atividade, string $titulo, string $data_inicio, string $data_fim, string $descricao, string $roteiro, int $user_id, int $atividade_id){
    $query = "UPDATE tbl_atividades SET tipo_atividade = :tipo_atividade, titulo_atividade = :titulo, inicio_atividade = :data_inicio, termino_atividade = :data_fim, descricao_atividade = :descricao, roteiro_atividade = :roteiro, atividade_escola_id = :user_id WHERE atividades_id = :atividade_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tipo_atividade", $tipo_atividade);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":data_inicio", $data_inicio);
    $stmt->bindParam(":data_fim", $data_fim);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":roteiro", $roteiro);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":atividade_id", $atividade_id);

    $stmt->execute();
}

function create_atividade_admin(object $pdo, string $tipo_atividade, string $titulo, string $data_inicio, string $data_fim, string $descricao, string $roteiro, int $escola_id){
    $query = "INSERT INTO tbl_atividades (tipo_atividade, titulo_atividade, inicio_atividade, termino_atividade, descricao_atividade, roteiro_atividade, atividade_escola_id) VALUES (:tipo_atividade, :titulo, :data_inicio, :data_fim, :descricao, :roteiro, :escola_id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tipo_atividade", $tipo_atividade);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":data_inicio", $data_inicio);
    $stmt->bindParam(":data_fim", $data_fim);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":roteiro", $roteiro);
    $stmt->bindParam(":escola_id", $escola_id);

    $stmt->execute();
}

function edit_atividade_admin(object $pdo, string $tipo_atividade, string $titulo, string $data_inicio, string $data_fim, string $descricao, string $roteiro, int $escola_id, int $atividade_id){
    $query = "UPDATE tbl_atividades SET tipo_atividade = :tipo_atividade, titulo_atividade = :titulo, inicio_atividade = :data_inicio, termino_atividade = :data_fim, descricao_atividade = :descricao, roteiro_atividade = :roteiro, atividade_escola_id = :escola_id WHERE atividades_id = :atividade_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":tipo_atividade", $tipo_atividade);
    $stmt->bindParam(":titulo", $titulo);
    $stmt->bindParam(":data_inicio", $data_inicio);
    $stmt->bindParam(":data_fim", $data_fim);
    $stmt->bindParam(":descricao", $descricao);
    $stmt->bindParam(":roteiro", $roteiro);
    $stmt->bindParam(":escola_id", $escola_id);
    $stmt->bindParam(":atividade_id", $atividade_id);

    $stmt->execute();
}

function get_atividades(object $pdo){
    $query = "SELECT * FROM tbl_atividades ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_atividades_by_id(object $pdo, int $id){
    $query = "SELECT * FROM tbl_atividades WHERE atividades_id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_school_name($pdo, $school_id) {
    $stmt = $pdo->prepare("SELECT escola_nome FROM tbl_escolas WHERE escola_id = ?");
    $stmt->bindValue(1, $school_id);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['escola_nome'];
}

// function to get atividades_nome from search bar 
function get_atividades_nome(object $pdo, string $atividade_nome) {

    // se o campo de pesquisa estiver vazio, retorna todas as atividades
    if($atividade_nome == ""){
        return get_atividades($pdo);
    }

    $atividade_nome = "%$atividade_nome%"; 

    $query = "SELECT * FROM tbl_atividades WHERE titulo_atividade LIKE :atividade_nome;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":atividade_nome", $atividade_nome);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

