<?php 
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/compromissos.php';

$userData = get_user($pdo, $_SESSION['user_id']);
$compromisso = get_compromissos_by_user_id($pdo, $userData['user_id']);

$error = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $titulo = $_POST['titulo_consulta'];
    $texto = $_POST['texto_consulta'];
    $data = $_POST['data_consulta'];
    $idUtilizador = $userData['user_id'];

    if($titulo == "" || $texto == "" || $data == ""){
        $error = "Por favor preencha todos os campos";
    }

    if($error == ""){
        $result = insert_compromisso($pdo, $idUtilizador, $titulo, $texto, $data);
        if($result){
            header("Location: user_compromissos.php");
        } else {
            $error = "Erro ao criar compromisso";
        }
    }    
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/user_header.php'; ?>

<body>
    <?php include '../include/user_nav.php'; ?>
    <div class="container emp1-profile">                
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
        <div class="dividir">
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>INSERIR COMPROMISSO</h5>                            
            </div>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="titulo_consulta" placeholder="Título do compromisso"><br>
                        <textarea class="form-control" name="texto_consulta" placeholder="Descrição do compromisso"></textarea>
                        <input type="date" id="commit_date" name="data_consulta"><br><br>
                        <input type="submit" value="Criar" class="logout_btn">
                    </div>
                    <div>
                        <?php if($error != ""){ ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                    </div>
                </form>                                      
        </div>                        
    </div>
</body>
</html>
<a ></a>