<?php
require_once __DIR__ . '/../Classes/Dbh.php';
require_once __DIR__ . '/../Classes/Newsletter.php';

$response = [
    'success' => false, 
    'message' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 

    if ($email == '') {
        $response['message'] = 'Por favor, insira o seu email.';
        exit(json_encode($response));
    }

    if ($newsletter->emailExists($email)) {
        $response['message'] = 'Email já está registado.';
        exit(json_encode($response));
    }

    if (!$newsletter->insertEmail($email)) {
        $response['message'] = 'Unable to subscribe.';
        exit(json_encode($response));
    }

    $response['success'] = true;
    $response['message'] = 'Obrigado por ter subscrito a nossa Newsletter!';
}

echo json_encode($response);