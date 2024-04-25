<?php

require_once 'include/utils.inc.php';
require_once 'include/dbh.inc.php'; 
require_once 'include/db_query.php';

function parseEnv($filePath){
    if (!file_exists($filePath)) {
        throw new Exception('.env file not found');
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        $parts = explode('=', $line, 2);

        if (count($parts) === 2) {
            putenv(trim($parts[0]) . '=' . trim($parts[1]));
        }
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])){

    $senha = htmlspecialchars($_POST['senha']);
    $user = get_user($pdo, $_SESSION['user']);
    
    if($user['is_admin'] === 1){
    
        parseEnv(__DIR__ . '\include\password.env');
        $password = getenv('PASSWORD');
        
        if($senha === $password){
            $id = $_GET['id'];
            $stmt = $pdo->prepare("DELETE FROM tbl_atividades WHERE atividades_id = $id");
            $stmt->execute();
        } else {
            echo "Senha incorreta";
            die();
        }       
    } else {    
        echo "Você não tem permissão para apagar atividades";
        die();
    }
} else {
    echo "Erro ao apagar atividade";
    die();
} 
    
   
    
   