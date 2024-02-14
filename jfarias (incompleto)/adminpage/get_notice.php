<?php

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_noticias WHERE id_noticias = ?");
    $stmt->execute([$id]);
    $noticia = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$noticia){
        echo json_encode(['error' => 'Noticia não encontrada']);
        exit;
    } else {
        echo json_encode($noticia);
    }
}


?>
