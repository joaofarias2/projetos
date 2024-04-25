<?php
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/projetos.inc.php';

$userData = get_user($pdo, $_SESSION['user_id']);

if ($userData['user_role'] !== 'admin') {
    header("Location: index.php");  
}

$projects = get_projetos($pdo);

?>

<!DOCTYPE html>
<html lang="pt">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>

<div class="container-fluid conteudo">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 tabela_atividades">
                    <div class="card-header pb-0">
                        <h5>Noticias</h5>
                    </div>
                    <div class="card-body px-0 pt-0 ">
                        <div class="table-responsive ">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="th" id="first_table_name">ID projeto</th>
                                        <th class="th">titulo</th>
                                        <th class="th">Info</th>
                                        <th class="th">Imagem</th>
                                        <th class="th"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($projects as $project): ?>
                                    <tr>
                                        <td><?php echo $project['id_projeto']; ?></td>
                                        <td><?php echo $project['projeto_nome']; ?></td>
                                        <td><?php echo $project['projeto_info']; ?></td>
                                        <?php  if($project['projeto_imagem'] != ""){ ?>
                                            <td>
                                                <img src="../uploads/<?=$project['projeto_imagem']?>" alt="project image" class="img-thumbnail" style="width: 100px;">
                                            </td> 
                                        <?php } else { ?>
                                            <td>
                                                <p style="color: red;">Sem imagem</p>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <a href="edit_projetos.php?id=<?php echo $project['id_projeto']; ?>" class="btn btn-primary">Editar</a>
                                            <a href="delete_projeto.php?id=<?php echo $project['id_projeto']; ?>" class="btn btn-danger">Apagar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div> 


</body>
</html>
