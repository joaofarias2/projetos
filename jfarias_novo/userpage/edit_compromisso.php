<?php 
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/compromissos.php';

$userData = get_user($pdo, $_SESSION['user_id']);
$compromisso = get_compromissos_by_user_id($pdo, $userData['user_id']);

$error = "";
$success = "";

if(isset($_GET['id'])){     
    $compromissoId = $_GET['id']; 
    $compromissos = get_compromisso_by_id($pdo, $compromissoId);
    $action = $_SERVER['PHP_SELF']."?id=".$_GET['id'];     
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $titulo = $_POST['titulo_consulta'];
    $texto = $_POST['texto_consulta'];
    $data = $_POST['data_consulta'];

    if($titulo == "" || $texto == "" || $data == ""){
        $error = "Por favor preencha todos os campos";
    }

    if($error == ""){
        $result = update_compromisso($pdo, $compromissoId, $titulo, $texto, $data);
        if($result){
            $success = "Compromisso atualizado com sucesso";
        } else {
            $error = "Erro ao criar compromisso";
        }
    }

    $compromissos = get_compromisso_by_id($pdo, $compromissoId);

    
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
                        <h5>SEUS COMPROMISSOS</h5>
                        <table>
                        <?php foreach($compromisso as $compromisso): ?>                            
                                <tr>
                                    <td><?php echo ucfirst($compromisso['titulo_consulta']); ?></td>
                                    <td>
                                        &nbsp; &nbsp; &nbsp;
                                        <?php 
                                            $commitDate = strtotime($compromisso['data_consulta']);
                                            $currentDate = time();
                                            $difference = $commitDate - $currentDate;
                                            if ($difference < (72 * 3600)) { 
                                                echo '<span style="color: gray;" aria-disabled="true"><i class="fa-regular fa-pen-to-square"></i></span> 
                                                <span style="color: gray;" aria-disabled="true"> <i class="fa-solid fa-xmark"></i></span>';
                                            } else {
                                                echo '<a href="edit_compromisso.php?id=' . $compromisso['id_consulta'] . '"><i class="fa-regular fa-pen-to-square"></i></a> <a href="delete_compromissos.php?id=' . $compromisso['id_consulta'] . '"><i class="fa-solid fa-xmark"></i></a>';
                                            }
                                        ?>
                                    </td>
                                </tr>                            
                        <?php endforeach; ?>
                        </table>
                        <br>
                        <p style="font-size: 12px;">*Só pode editar o compromisso até 72hr antes.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                            <h5>EDITAR COMPROMISSO</h5>                            
                        </div>
                            <form action="<?=$action?>" method="post">
                                <div class="form-group">
                                    <label for="titulo_consulta">Titulo</label> 
                                    <input type="text" name="titulo_consulta" class="form-control" value="<?php echo $compromissos['titulo_consulta']; ?>">
                                    <textarea class="form-control" name="texto_consulta" ><?php echo $compromissos['texto_consulta']?></textarea><br>
                                    <input type="date" name="data_consulta" class="form-control" value="<?php echo $compromissos['data_consulta']; ?>"><br>
                                    <input type="submit" value="Editar" class="logout_btn">
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
                            </form>                                      
                    </div>                    
                </div>          
        </div>
</body>
</html>
<a ></a>