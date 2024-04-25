<?php
declare(strict_types=1);

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $projetoId = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM tbl_projetos WHERE id_projeto = $projetoId");
    $stmt->execute();
    header("Location: projetos.php");
}