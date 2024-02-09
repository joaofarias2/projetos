<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST"){


    $username = $_POST["reg_username"];
    $password = $_POST["reg_password"];
    $email = $_POST["reg_email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS

        $errors = [];

        $result = [
            'success' => true,
            'errors' => $errors
        ];


        if(is_input_empty($username, $password, $email)){
            $errors["empty_input"] = "Preencha todos os campos!";
        }

        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Email inválido!";
        }

        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Este nome de utilizador já esta em uso!";
        }

        if(is_email_registered($pdo, $email)){
            $errors["email_used"] = "Este email já esta registado!";
        }
        require_once 'config_session.inc.php';

        if(!empty($errors)){
            $result['errors'] = $errors;
            $result['success'] = false;             
        } else {
            create_user($pdo, $password, $username, $email);
            $pdo = null;
            $stmt = null;
        }

        exit(json_encode($result));
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    exit(json_encode(['success' => false,"error" => "Invalid request"]));
}

