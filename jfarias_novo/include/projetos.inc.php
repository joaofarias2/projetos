<?php

function get_projetos(object $pdo){
    $stmt = $pdo->prepare("SELECT * FROM tbl_projetos");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_projetos_by_id(object $pdo, int $id){
    $stmt = $pdo->prepare("SELECT * FROM tbl_projetos WHERE id_projeto = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function update_projetos(object $pdo, int $id, string $titulo, string $texto, string $imagem){
    $stmt = $pdo->prepare("UPDATE tbl_projetos SET projeto_nome = :titulo, projeto_info = :texto, projeto_imagem = :imagem WHERE id_projeto = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':imagem', $imagem);
    $result = $stmt->execute();

    return $result;
}