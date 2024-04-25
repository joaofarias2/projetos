<?php
 require_once '../include/utils.inc.php';
 require_once '../include/dbh.inc.php';
 require_once '../include/login_model.inc.php';
 require_once '../include/projetos.inc.php';

$error = "";
$success = "";

 $userData = get_user($pdo, $_SESSION['user_id']);
 
 if ($userData['user_role'] !== 'admin') {
     header("Location: index.php");  
 }

 if(isset($_GET['id'])){     
     $projetoId = $_GET['id']; 
     $projeto = get_projetos_by_id( $pdo, $projetoId);
     $action = $_SERVER['PHP_SELF']."?id=".$_GET['id'];     
 } 

 

 if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titulo'])){
       
        $projetoTit = $_POST['titulo'];
        $projetoTxt = $_POST['texto'];
        $projetoImg = $_FILES['projeto_imagem'];  
        
        if($projetoTit == "" || $projetoTxt == ""){
            $error = "Por favor preencha todos os campos";
        }else{
            if(isset($_FILES['projeto_imagem']) && $_FILES['projeto_imagem']['name'] != ""){          
                $uploaddir = '../uploads/';
                $uploadfile = $uploaddir . basename($_FILES['projeto_imagem']['name']);
                move_uploaded_file($_FILES['projeto_imagem']['tmp_name'], $uploadfile);            
            } else {
                $projetoImg['name'] = $projeto['projeto_imagem'];
            }
        }

        if($error == ""){
            $result = update_projetos($pdo, $projetoId, $projetoTit, $projetoTxt, $projetoImg['name']);
            if($result){
                $success = "Projeto atualizado com sucesso";
            } else {
                $error = "Erro ao atualizar projeto";
            }
        }

        $projeto = get_projetos_by_id($pdo, $projetoId);

 }

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php'; ?>

<h2>Projetos</h2>

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
                        <input type="text" value="<?=$projeto['projeto_nome']?>" class="form-control" name="titulo">
                    </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Texto</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <input type="text" value="<?=$projeto['projeto_info']?>" class="form-control" name="texto">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h5>Imagem</h5>
                </div>
                <div class="col-md-9 text-secondary">
                    <input type="file"  class="form-control" name="projeto_imagem">
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
            <button class="btn_editar" type="submit">Editar Projeto</button>
            <hr>
                
        </div>
        </form>
</section>

</body>
</html>