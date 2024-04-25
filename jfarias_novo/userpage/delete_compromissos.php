<?php 

declare(strict_types=1);

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $compromissoId = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM tbl_consulta WHERE id_consulta = $compromissoId");
    $stmt->execute();
    header("Location: user_compromissos.php");
}

