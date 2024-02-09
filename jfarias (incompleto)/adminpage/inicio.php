<?php 
session_start();

require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';

$userData = get_user($pdo, $_SESSION['user_id']);


$defaultPicture = 'img/firstava.png';

if (!empty($userData['user_pic'])) {
  $profilePicture = $userData['user_pic'];
} else {
  $profilePicture = $defaultPicture;
}

if(!empty($userData['user_morada'])){
  $usermorada = $userData['user_morada'];
} else {
  $usermorada = 'N/A';
}

if(!empty($userData['user_nome_completo'])){
  $usernome = $userData['user_nome_completo'];
} else {
  $usernome = 'N/A';
}

if(!empty($userData['user_telefone'])){
  $usertel = $userData['user_telefone'];
} else {
  $usertel = 'N/A';
}

?>
<div class="row">
          <div class="col-md-12 mt-1">
            <div class="card mb-3 p-5">
              <h2>Perfil</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <h5>Nome Completo</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                      <?php echo $usernome; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Email</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                      <?php echo $userData['user_email']; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Telefone</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                      <?php echo  $usertel; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Morada</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                      <?php echo $usermorada; ?>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
      </div>