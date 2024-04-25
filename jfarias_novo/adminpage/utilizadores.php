<?php
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';

$userData = get_user($pdo, $_SESSION['user_id']);

if ($userData['user_role'] !== 'admin') {
    header("Location: index.php");  
} 

$stmt = $pdo->query("SELECT * FROM tbl_utilizadores");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($userData['user_morada'])){
    $usermorada = 'N/A';
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>

<div class="container-fluid conteudo">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 tabela_atividades">
                <div class="card-header pb-0">
                    <h5>Utilizadores</h5>
                </div>
                <div class="card-body px-0 pt-0 ">
                    <div class="table-responsive ">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="th" id="first_table_name">Tipo de Atividade</th>
                                    <th class="th">Titulo</th>
                                    <th class="th">Data Inicio</th>
                                    <th class="th">Escola</th>
                                    <th class="th"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['user_name']; ?></td>
                                <td><?php echo $user['user_email']; ?></td>
                                <td><?php if(empty($user['user_morada'])){
                                                echo 'N/A';
                                            } else {
                                                echo $user['user_morada'];
                                            } ; ?></td>
                                <td>
                                    <a href="edit_user.php?id=<?php echo $user['user_id']; ?>" class="btn btn-info">Editar</a>
                                    <a href="delete_user.php?id=<?php echo $user['user_id']; ?>" class="btn btn-danger">Apagar</a>
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

