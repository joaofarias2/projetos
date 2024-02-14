<?php
 require_once '../include/utils.inc.php';
 require_once '../include/dbh.inc.php';
 require_once '../include/login_model.inc.php';
 require_once '../include/insert_notice.php';

$error = "";
$success = "";

 $userData = get_user($pdo, $_SESSION['user_id']);
 
 if ($userData['user_role'] !== 'admin') {
     header("Location: index.php");  
 }

 if(isset($_GET['id'])){     
     $noticId = $_GET['id']; 
     $noticias = get_notice_by_id($pdo, $noticId);
     $action = $_SERVER['PHP_SELF']."?id=".$_GET['id'];     
 } 

 

 if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titulo'])){
       
        $notTitulo = $_POST['titulo'];
        $notTexto = $_POST['texto'];
        $notImg = $_FILES['imagem_noticia'];  
        
        if($notTitulo == "" || $notTexto == ""){
            $error = "Por favor preencha todos os campos";
        }else{
            if(isset($_FILES['imagem_noticia']) && $_FILES['imagem_noticia']['name'] != ""){          
                $uploaddir = '../uploads/';
                $uploadfile = $uploaddir . basename($_FILES['imagem_noticia']['name']);
                move_uploaded_file($_FILES['imagem_noticia']['tmp_name'], $uploadfile);            
            }
        }

        if($error == ""){
            $result = update_notice($pdo, $noticId, $notTitulo, $notTexto, $notImg['name']);
            if($result){
                $success = "Noticia atualizada com sucesso";
            } else {
                $error = "Erro ao atualizar noticia";
            }
        }

        $noticias = get_notice_by_id($pdo, $noticId);

 }

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>

<h2>Noticias</h2>

<section class="hero container-fluid">
    <div id="ss">
        <div class="row">
            <div class="col-md-12 mt-3 card">
            <form action="<?=$action?>" method="POST"  enctype="multipart/form-data">
        <div class="card-body">           
            <div class="row">                
                    <div class="col-md-3">
                        <h5>Titulo</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <input type="text" value="<?=$noticias['noticias_titulo']?>" class="form-control" name="titulo">
                    </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Texto</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <input type="text" value="<?=$noticias['noticias_texto']?>" class="form-control" name="texto">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Imagem</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <input type="file"  class="form-control" name="imagem_noticia">
                </div>
            </div>
            <div>
                <?php if($error != ""){ ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
            </div>
            <div>
                <?php if($success != ""){ ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?php echo $success; ?>
                    </div>
                <?php } ?>
            </div>
            <button class="btn_editar" type="submit">Editar Noticia</button>
            <hr>
                
        </div>
        </form>
</section>

</body>
</html>