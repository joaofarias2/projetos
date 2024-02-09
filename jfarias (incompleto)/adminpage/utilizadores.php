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

<h2>Utilizadores</h2>



<section class="hero container-fluid">
   <div id="ss">
      <div class="row">
          <div class="col-md-12 mt-3 card m-4">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">User ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Email</th>
                  <th scope="col">Morada</th>
                  <th scope="col">Ações</th>
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
</section>

</body>
</html>

