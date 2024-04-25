<?php 
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/compromissos.php';
require_once '../include/insert_notice.php';
require_once '../include/signup_contr.inc.php';
require_once '../include/signup_model.inc.php';

$error = "";
$succes = "";

$userData = get_user($pdo, $_SESSION['user_id']);
$defaultPicture = 'firstava.png';

if (!empty($userData['user_pic'])) {
    $profilePicture = $userData['user_pic'];
} else {
    $profilePicture = $defaultPicture;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {

   
    $name = $_POST['nome'];
    $morada = $_POST['morada'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $img = $_FILES['user_pic'];

    if($name == "" || $morada == "" || $telefone == "" || $email == ""){
       $error = "Por favor preencha todos os campos";
    }else{      
        if(isset($_FILES['user_pic']) && $_FILES['user_pic']['name'] != ""){          
            $uploaddir = '../uploads/';
            $uploadfile = $uploaddir . basename($_FILES['user_pic']['name']);
            move_uploaded_file($_FILES['user_pic']['tmp_name'], $uploadfile);            
        } else {
            $img['name'] = $userData['user_pic'];
        }
       
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Email inválido";
        }

        if(is_email_registered($pdo, $email, $userData['user_id'])){
            $error = "Email já registado";
        }
    }   
    

    if($error == ""){
        $result = update_user($pdo, $userData['user_id'], $name, $morada, $telefone, $email, $img['name']);
        if($result){
            $succes = "Perfil atualizado com sucesso";
        } else {
            $error = "Erro ao atualizar perfil";
        }
    }

    $userData = get_user_by_id($pdo, $userData['user_id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/user_header.php'; ?>
<body>
    <?php include '../include/user_nav.php'; ?>
    <div class="container emp-profile">
            
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="../img/<?php echo $profilePicture; ?>" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                                    <h5>
                                        EDITAR PERFIL
                                    </h5>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" > <?php echo $userData['user_name']; ?></a>
                                </li>
                            </ul>
                        </div>
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST"  enctype="multipart/form-data">
                        <div class="card-body">
                        
                            <div class="row">                
                                    <div class="col-md-3">
                                        <h5>Nome Completo</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="text" value="<?=$userData['user_nome_completo']?>" class="form-control" name="nome">
                                    </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <input type="text" value="<?=$userData['user_email']?>" class="form-control" name="email">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Telefone</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <input type="text" value="<?=$userData['user_telefone']?>" class="form-control" name="telefone">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Morada</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <input type="text" value="<?=$userData['user_morada']?>" class="form-control" name="morada">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Imagem</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <input type="file" class="form-control" name="user_pic">
                                    <?php if($userData['user_pic'] != ""){ ?>
                                        <img src="../uploads/<?=$userData['user_pic']?>" alt="profile picture" class="img-thumbnail" style="width: 100px;">
                                    <?php } ?>
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
                                <?php if($succes != ""){ ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                        <?php echo $succes; ?>
                                    </div>
                                <?php } ?>
                            </div>
                                <button class="btn_editar logout_btn" type="submit">Editar</button>
                        </div>
                        </form>
                    </div>                    
                </div>
    </div>
</body>
</html>
