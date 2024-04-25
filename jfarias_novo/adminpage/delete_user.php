<?php
//deletes user by id using PDO
declare(strict_types=1);

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM tbl_utilizadores WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
    header("Location: utilizadores.php");
}