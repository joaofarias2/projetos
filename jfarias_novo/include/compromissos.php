<?php

function get_compromisso(object $pdo){
    $stmt = $pdo->prepare("SELECT tbl_consulta.id_consulta, tbl_utilizadores.user_name AS nome_utilizador, tbl_consulta.titulo_consulta, tbl_consulta.texto_consulta FROM tbl_consulta INNER JOIN tbl_utilizadores ON tbl_consulta.id_utilizador = tbl_utilizadores.user_id;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_compromisso_by_id(object $pdo, int $id){
    $stmt = $pdo->prepare("SELECT * FROM tbl_consulta WHERE id_consulta = $id");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_compromissos_by_user_id(object $pdo, int $idUtilizador){
    $stmt = $pdo->prepare("SELECT * FROM tbl_consulta WHERE id_utilizador = $idUtilizador");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function insert_compromisso(object $pdo, int $idUtilizador, string $titulo, string $texto, string $data){
    $stmt = $pdo->prepare("INSERT INTO tbl_consulta (id_utilizador, titulo_consulta, texto_consulta, data_consulta) VALUES (?, ?, ?, ?)");
    $stmt->execute([$idUtilizador, $titulo, $texto, $data]);
    return true;
}

function update_compromisso(object $pdo, int $id, string $titulo, string $texto, string $data){
    $stmt = $pdo->prepare("UPDATE tbl_consulta SET titulo_consulta = ?, texto_consulta = ?, data_consulta = ? WHERE id_consulta = ?");
    $stmt->execute([$titulo, $texto, $data, $id]);
    return true;
}

?>