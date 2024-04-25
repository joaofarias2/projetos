<?php

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/projetos.inc.php';

$userData = get_user($pdo, $_SESSION['user_id']);

$projetos = get_projetos($pdo);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JFarias - Projetos</title>
    <?php include '../include/user_header.php'; ?>
    <link rel="stylesheet" href="../css/user_noticias.css">

</head>
<body>
<?php include '../include/user_nav.php'; ?>
<div id="portfolio" class="portfolio">
    <div class="container">
        <?php foreach ($projetos as $projeto) : ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../uploads/<?=$projeto['projeto_imagem']?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-title"><?= $projeto['projeto_nome'] ?></p>
                    <p class="card-text"><?=$projeto['projeto_info']?> </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>