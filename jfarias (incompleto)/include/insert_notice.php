<?php

function insert_notice(object $pdo, string $notTit, string $notTexto, $notimg){
    $stmt = $pdo->prepare("INSERT INTO tbl_noticias (noticias_titulo, noticias_texto, noticias_imagem) VALUES (:notTit, :notTexto, :notimg)");

    $stmt->bindParam(':notTit', $notTit, PDO::PARAM_STR);
    $stmt->bindParam(':notTexto', $notTexto, PDO::PARAM_STR);
    $stmt->bindParam(':notimg', $notimg, PDO::PARAM_STR);

    $stmt->execute();

    return true;
}

function update_notice(object $pdo, int $notId, string $notTit, string $notTexto, $notimg){
    $stmt = $pdo->prepare("UPDATE tbl_noticias SET noticias_titulo = :notTit, noticias_texto = :notTexto, noticias_imagem = :notimg WHERE id_noticias = :notId");

    $stmt->bindParam(':notId', $notId, PDO::PARAM_INT);
    $stmt->bindParam(':notTit', $notTit, PDO::PARAM_STR);
    $stmt->bindParam(':notTexto', $notTexto, PDO::PARAM_STR);
    $stmt->bindParam(':notimg', $notimg, PDO::PARAM_STR);

    $stmt->execute();

    return true;
}

function get_notice_by_id(object $pdo, int $notId){
    $stmt = $pdo->prepare("SELECT * FROM tbl_noticias WHERE id_noticias = $notId");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}