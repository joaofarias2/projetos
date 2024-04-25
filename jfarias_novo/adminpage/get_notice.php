<?php


 require_once '../include/utils.inc.php';
 require_once '../include/dbh.inc.php';
 require_once '../include/login_model.inc.php';
 require_once '../include/insert_notice.php';

$error = "";
$success = "";

 if(isset($_GET['id'])){     
     $noticId = $_GET['id']; 
     $noticias = get_notice_by_id($pdo, $noticId);  
     
 } 

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>


<section class="hero container-fluid">
   
    <?php if($noticias['noticias_imagem'] != null): ?>
        <div class="card noticia_card">
            <div class="card-body">
                <img src="../img/<?php echo $noticias['noticias_imagem']?>" class="card-img-left" alt="Imagem da noticia" style="max-width: 250px">
            </div>
            <h2><?php echo $noticias['noticias_titulo']?></h2>            
                <?php echo $noticias['noticias_texto']?>            
        </div>
    <?php endif; ?>
</section>

</body>
</html>
