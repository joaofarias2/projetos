<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="../img/logo.png" id="my_img" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="userdash.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_compromissos.php">Compromissos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_projetos.php">Projetos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_noticias.php">Noticias</a>
        </li>
      </ul>
      <ul class="navbar-nav d-flex flex-row ms-auto me-3">
        <li>
            <a href="../include/logout.inc.php" class="btn logout_btn">Sair</a>
            <div id="msg">Bem vindo,  <?php echo $_SESSION['user_id']; ?>!</div>
        </li>
        <li>
            
        </li>
      </ul>
    </div>
  </div>
</nav>