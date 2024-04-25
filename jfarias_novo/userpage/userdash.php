<?php 
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/compromissos.php';
require_once '../include/insert_notice.php';

$userData = get_user($pdo, $_SESSION['user_id']);
$defaultPicture = 'firstava.png';

if (!empty($userData['user_pic'])) {
    $profilePicture = $userData['user_pic'];
} else {
    $profilePicture = $defaultPicture;
}

$compromisso = get_compromissos_by_user_id($pdo, $userData['user_id']);
$noticia = get_notice($pdo);
$latest_news = latest_news($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/user_header.php'; ?>
<body>
    <?php include '../include/user_nav.php'; ?>
    <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img ">
                            <img src="../img/<?php echo $profilePicture; ?>" alt="" class="rounded-circle"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $userData['user_nome_completo']; ?>
                                    </h5>
                                    <h6>
                                       <?php echo $userData['user_role']; ?>
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="user_edit_profile.php"><button class="profile-edit-btn logout_btn" >Edit Profile</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>COMPROMISSOS</p>
                            <?php foreach($compromisso as $compromisso): ?>
                                <a href=""><?php echo ucfirst($compromisso['titulo_consulta']); ?></a><br/>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User ID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userData['user_name']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userData['user_nome_completo']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userData['user_email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $userData['user_telefone']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Morada</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo ucwords($userData['user_morada']); ?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>          
        </div>
</body>
</html>
<a ></a>