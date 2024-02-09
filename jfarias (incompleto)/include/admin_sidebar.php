<?php

$myProfileData = get_user($pdo, $_SESSION['user_id']);


  if ($myProfileData['user_role'] !== 'admin') {
      header("Location: index.php");  
  } 
  


$defaultPicture = 'firstava.png';
$useremail = $myProfileData['user_email'];

if (!empty($myProfileData['user_pic'])) {
  $profilePicture = $myProfileData['user_pic'];
} else {
  $profilePicture = $defaultPicture;
}

if(!empty($myProfileData['user_morada'])){
  $usermorada = $myProfileData['user_morada'];
} else {
  $usermorada = 'N/A';
}

if(!empty($myProfileData['user_nome_completo'])){
  $usernome = $myProfileData['user_nome_completo'];
} else {
  $usernome = 'N/A';
}

if(!empty($myProfileData['user_telefone'])){
  $usertel = $myProfileData['user_telefone'];
} else {
  $usertel = 'N/A';
}

?>
<div class="card text-center sidebar">
    <div class="card-body">
    <img src="../img/<?php echo $profilePicture; ?>" alt="User Avatar" class="rounded-circle" width="150">
    <div class="mt-3">
        <h3><?php echo $_SESSION['user_id']; ?></h3>
        <a href="../adminpage/edit_user.php"><button id="edit_profile"  class="btn_sidebar">Editar Perfil</button></a>
        <button class="btn_sidebar">Mensagens</button>
    </div>
    </div>
</div>
