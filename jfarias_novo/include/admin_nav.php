<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../img/logo.png" id="my_img" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="../adminpage/admindash.php"><button class="navbar-button nav-link" id="inicio" >Inicio</button></a>
        </li>
        <li class="nav-item">
          <a href="../adminpage/utilizadores.php"><button class="navbar-button nav-link" id="utilizadores">Utilizadores</button></a>
        </li>
        <li class="nav-item">
          <a href="../adminpage/compromisso.php"><button class="navbar-button nav-link">Compromissos</button></a>
        </li>
        <li class="nav-item">
          <a href="../adminpage/noticias.php"><button class="navbar-button nav-link" >Noticias</button></a>
        </li>
        <li class="nav-item">
          <a href="../adminpage/projetos.php"><button class="navbar-button nav-link" >Projetos</button></a>
        </li>
      </ul>
      
      
        <div>
          <a href="../include/logout.inc.php"><button class="sair_btn">Sair</button></a><br>
          <div id="msg">Bem vindo, <?php echo $_SESSION['user_id']; ?></div>
        </div>
      
      
    </div>
  </div>
</nav>