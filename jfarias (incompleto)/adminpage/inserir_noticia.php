<?php
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/insert_notice.php';

$userData = get_user($pdo, $_SESSION['user_id']);

if ($userData['user_role'] !== 'admin') {
    header("Location: index.php");  
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$notTit = $_POST['titulo'];
$notTexto = $_POST['texto'];
$notimg = $_FILES['imagem_noticia'];

if($notTit == "" || $notTexto == "" || $notimg['name'] == ""){
    $error = "Por favor preencha todos os campos";
 } else {      
     if(isset($_FILES['imagem_noticia']) && $_FILES['imagem_noticia']['name'] != ""){          
         $uploaddir = '../uploads/';
         $uploadfile = $uploaddir . basename($_FILES['imagem_noticia']['name']);
         move_uploaded_file($_FILES['imagem_noticia']['tmp_name'], $uploadfile);            
     }
 }

 if($error == ""){
    $result = insert_notice($pdo, $notTit, $notTexto, $notimg['name']);
    if($result){
        $success = "Noticia criada com sucesso!";
    } else {
        $error = "Erro ao criar noticia";
    }
 }

}


?>


<!DOCTYPE html>
<html lang="en">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>

<h2>Inserir Noticia</h2>

<section class="hero container-fluid">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data">
        <div class="card-body">           
            <div class="row">                
                    <div class="col-md-3">
                        <h5>Titulo</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <input type="text" class="form-control" name="titulo">
                    </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Texto</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <input type="text" class="form-control" name="texto">
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
            <button class="btn_editar" type="submit">Criar Noticia</button>
            <hr>
                
        </div>
        </form>
</section>

</body>
</html>