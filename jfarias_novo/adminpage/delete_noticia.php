<?php
declare(strict_types=1);

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $noticiaId = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM tbl_noticias WHERE id_noticias = $noticiaId");
    $stmt->execute();
    header("Location: noticias.php");
}