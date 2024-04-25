<?php
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/compromissos.php';

$userData = get_user($pdo, $_SESSION['user_id']);

if ($userData['user_role'] !== 'admin') {
    header("Location: index.php");  
}

$projects = get_compromisso($pdo);

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
                    <h5>Compromissos</h5>
                </div>
                <div class="card-body px-0 pt-0 ">
                    <div class="table-responsive ">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="th" id="first_table_name">ID projeto</th>
                                    <th class="th">Utilizador</th>
                                    <th class="th">Titulo</th>
                                    <th class="th">Texto</th>
                                    <th class="th"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($projects as $project): ?>
                                <tr>
                                    <td><?php echo $project['id_consulta']; ?></td>
                                    <td><?php echo $project['nome_utilizador']; ?></td>
                                    <td><?php echo $project['titulo_consulta']; ?></td>
                                    <td><?php echo $project['texto_consulta']; ?></td>
                                    <td>
                                        <a href="delete_compromisso.php?id=<?php echo $project['id_consulta']; ?>" class="btn btn-danger">Apagar</a>
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
