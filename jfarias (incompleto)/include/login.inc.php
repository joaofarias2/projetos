<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];

        $resultado = [
            'success' => true,
            'errors' => $errors
        ];

        if(is_input_empty($username, $password)){
            $errors["empty_input"] = "Preencha todos os campos!";
        }

        $result = get_user($pdo, $username);

        if(is_user_wrong($result)){
            $errors["login_incorrect"] = "Dados Incorrectos!";
        }

        if(!is_user_wrong($result) && is_password_wrong($password, $result["user_password"])){
            $errors["login_incorrect"] = "Dados Incorrectos!";
        }

        require_once 'config_session.inc.php';

        if(!empty($errors)){
            $resultado['errors'] = $errors;
            $resultado['success'] = false; 
        }
            
        $_SESSION['user_id'] = $username;
        echo json_encode($resultado);
        exit;
        
    } catch (PDOException $e) {
        $resultado['success'] = false;
        $resultado['errors']['database_error'] = "Erro no banco de dados.";
        echo json_encode($resultado);
        exit;
    }

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit;
}