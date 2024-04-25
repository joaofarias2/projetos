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

<section class="hero container-fluid">
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
                                        <th class="th" id="first_table_name">ID noticias</th>
                                        <th class="th">titulo</th>
                                        <th class="th">Texto</th>
                                        <th class="th">Ações</th>
                                        <th class="th"></th>
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
                            
                        </div>
                        <a href="inserir_noticia.php" class="btn btn-info" style="width: 200px;">Inserir Noticia</a>
                    </div>
                </div>
            </div>
        </div>        
    </div> 

   <div class="container-fluid conteudo">
      <div class="row">
          <div class="container-fluid noticias mt-5">
                <div class="row align-items-start">
                <?php foreach ($lastNot as $noticia): ?>
                        <div class="col-md-3">
                            <div class="card">                              
                                <img src="../uploads/<?php echo $noticia['noticias_imagem']; ?>" class="card-img-top" alt="imagem noticia">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $noticia['noticias_titulo']; ?></h5>
                                    <p class="card-text"><?php echo $noticia['noticias_texto']; ?></p>
                                    <a href="get_notice.php?id=<?php echo $noticia['id_noticias']; ?>" class="btn btn-primary" >Ver Noticia</a>
                                </div>
                            </div>
                        </div>                                                
                    <?php endforeach; ?>        
                </div>
            </div>
        </div>        
    </div>


</section>
</body>
</html>
