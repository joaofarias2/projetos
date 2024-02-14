<?php
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';

$userData = get_user($pdo, $_SESSION['user_id']);

if ($userData['user_role'] !== 'admin') {
    header("Location: index.php");  
}

$stmt = $pdo->query("SELECT * FROM tbl_noticias");
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt2 = $pdo->query("SELECT * FROM tbl_noticias ORDER BY id_noticias DESC LIMIT 4");
$lastNot = $stmt2->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>

<h2>Noticias</h2>

<section class="hero container-fluid">
   <div id="ss">
      <div class="row">
          <div class="col-md-12 mt-3 card">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">Noticias ID</th>
                  <th scope="col">titulo</th>
                  <th scope="col">texto</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($noticias as $noticia): ?>
                    <tr>
                        <td><?php echo $noticia['id_noticias']; ?></td>
                        <td><?php echo $noticia['noticias_titulo']; ?></td>
                        <td><?php echo $noticia['noticias_texto']; ?></td>
                        <td>
                            <a href="edit_noticia.php?id=<?php echo $noticia['id_noticias']; ?>" class="btn btn-info">Editar</a>
                            <a href="delete_noticia.php?id=<?php echo $noticia['id_noticias']; ?>" class="btn btn-danger">Apagar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <a href="inserir_noticia.php" class="btn btn-info" style="width: 200px;">Inserir Noticia</a>
          </div>
          <div class="container-fluid noticias mt-5">
                <div class="row align-items-start">
                <?php foreach ($lastNot as $noticia): ?>
                        <div class="col-md-3">
                            <div class="card">                              
                                <img src="../uploads/<?php echo $noticia['noticias_imagem']; ?>" class="card-img-top" alt="imagem noticia">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $noticia['noticias_titulo']; ?></h5>
                                    <p class="card-text"><?php echo $noticia['noticias_texto']; ?></p>
                                    <button class="btn btn-primary view-notice" data-target="<?php echo $noticia['id_noticias'];?>">Ver Noticia</button>
                                </div>
                            </div>
                        </div>                                                
                    <?php endforeach; ?>
                    <div id="content_noticia"></div>

                </div>
            </div>
</section>
</body>
</html>
