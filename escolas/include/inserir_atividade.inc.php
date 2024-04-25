<?php

require_once 'dbh.inc.php';
require_once 'db_query.php';
require_once 'utils.inc.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $tipo_atividade = htmlspecialchars($_POST['tipo']);
    $titulo = htmlspecialchars($_POST['titulo']);
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $escola = htmlspecialchars($_POST['nome_escola']);
    $descricao = htmlspecialchars($_POST['descricao']); 
    $roteiro = htmlspecialchars($_POST['roteiro'] ?? '');
    

    $errors = [];
    $atividadeExistente = get_atividades($pdo);
    $user = get_user($pdo, $_SESSION['user']); 
    
    $valid_tipo_values = array(0, 1, 2, 3);
    if (!in_array($tipo_atividade, $valid_tipo_values)) {
        $errors[] = "Tipo de atividade inválido";
    }


    if($user['is_admin'] == 1){
        $escola = htmlspecialchars($_POST['nome_escola']);
        if($tipo_atividade == '' || empty($titulo) || empty($data_inicio) || empty($data_fim) || empty($descricao) || empty($escola)){
            $errors[] = "Preencha todos os campos";
        } else if(!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $data_inicio)){
            $errors[] = "Data de inicio inválida";
        } else if(!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $data_fim)){
            $errors[] = "Data de fim inválida";
        } else if($data_inicio > $data_fim){
            $errors[] = "Data de inicio não pode ser maior que a data de fim";
        } else if($tipo_atividade == 3 && empty($roteiro)){
            $errors[] = "Preencha o campo de roteiro";
        } 
    } else {        
        if($tipo_atividade == '' || empty($titulo) || empty($data_inicio) || empty($data_fim) || empty($descricao)){
            $errors[] = "Preencha todos os campos";        
        } else if(!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $data_inicio)){
            $errors[] = "Data de inicio inválida";
        } else if(!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $data_fim)){
            $errors[] = "Data de fim inválida";
        } else if($data_inicio > $data_fim){
            $errors[] = "Data de inicio não pode ser maior que a data de fim";
        } else if($tipo_atividade == 3 && empty($roteiro)){
            $errors[] = "Preencha o campo de roteiro";
        } 
    } 

    
    if(!empty($errors)) {
        header("location: ../criar_atividade.php?error=" . urlencode(implode(", ", $errors)));
        exit();
    } 

    $activityExists = false;
    foreach ($atividadeExistente as $atividade) {
        if ($atividade['titulo_atividade'] == $titulo) {
            $activityExists = true;
            break;
        }
    }

    define('E_ADMIN', 1); 
     
    if (!$activityExists) {
        if($user['is_admin'] != E_ADMIN) {
            create_atividade($pdo, $tipo_atividade, $titulo, $data_inicio, $data_fim, $descricao, $roteiro, $user['escola_id']);
        } 
        
        if($user['is_admin'] = E_ADMIN) {
            create_atividade_admin($pdo, $tipo_atividade, $titulo, $data_inicio, $data_fim, $descricao, $roteiro, $escola);
        }
        
        $_SESSION['success_message'] = 'Atividade criada com sucesso!';
        header("location: ../dashboard.php");
        exit();
    } 

    $errors[] = "Atividade já existente";
    header("location: ../criar_atividade.php?error=" . urlencode(implode(", ", $errors)));
    exit();
    
} else {
    header("location: ../dashboard.php");
    exit();
}