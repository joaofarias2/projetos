
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JFarias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    
    <script src="https://kit.fontawesome.com/b03b1de26b.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/owl.carousel.min.css"> 
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/lity.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    
    
</head>
<body>
  
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="img/logo.png" id="my_img" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link"  href="#hero">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="#sobre_nos">Sobre nós</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#portfolio">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#orcamento">Orçamento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contactos">Contactos</a>
              </li>
            </ul>
            
          </div>
          <div class="navbar_loginbtn">
            <button id="login" data-tooltip="Entre na sua conta" data-tooltip-location="bottom">Entrar</button>
            <button id="cadastro" class="cadastrar" data-tooltip="Abrir menu" data-tooltip-location="bottom"><i class="fa-solid fa-ellipsis tdots"></i></button>
            <ul class="hiden_nav">
              <li><i class="fa-solid fa-arrow-right-to-bracket" style="color: black;"></i><button id="showModal" class="h_btn"> Entrar / Cadastrar</button></li>
            </ul>	
          </div>
        </div>
      </nav>

      <!-- MODAL -->
      <div id="modal" class="modal_login">
        <div class="modal_content" id="signUpModal">
          
          <div class="closebtn_modal" onclick="backLogin()">
            <button class="back_arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px" viewBox="0 0 512 512"><title>ionicons-v5-a</title><polyline points="244 400 100 256 244 112" style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/><line x1="120" y1="256" x2="412" y2="256" style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/>
              </svg></button>            
            <button class="close_btn" onclick="closeModal()"><svg fill="currentColor" height="16" icon-name="close-outline" viewBox="0 0 20 20" width="16" xmlns="http://www.w3.org/2000/svg">
              <path d="m18.442 2.442-.884-.884L10 9.116 2.442 1.558l-.884.884L9.116 10l-7.558 7.558.884.884L10 10.884l7.558 7.558.884-.884L10.884 10l7.558-7.558Z"></path>
                    </svg></button>
          </div>
            <!-- Login MODAL-->
            <div id="ins_modal_login" class="ins_modal_login">
                <h2 class="login_h2">Entrar</h2>
                <form id="loginForm">
                    <input class="inpt_login" type="text" id="username" name="username" placeholder="Utilizador *">
                    <br>
                    <input class="inpt_login" type="password" id="password" name="password" placeholder="Password *">
                    <br>
                    <span class="btn login_btn" id="loginBtn" onclick="valLogin()" disabled>Entrar</span>
                </form>
                <div class="form-error" id="login-errors"></div>
                <p class="login_p">Não tem conta? <span  id="registar_link" class="login_link">Crie Aqui</span></p>
            </div>
            <!-- Registar -->
            <div id="ins_modal_registar" class="ins_modal_registar">
              <h2 class="login_h2">Criar conta</h2>              
              <form id="signupForm">
                <input class="inpt_login" type="email" id="reg_email" name="reg_email" placeholder="Email *">
                <br>
                <input class="inpt_login" type="text" id="reg_username" name="reg_username" placeholder="Utilizador *">
                <br>
                <input class="inpt_login" type="password" id="reg_password" name="reg_password" placeholder="Password *">
                <br>
                <span class="btn senha_btn" id="signupBtn" onclick="validateSignup()">Cadastrar</span>
            </form>
            <div class="form-error" id="singup-errors"></div>
          </div>
        </div>
      </div>

      

      <aside class="sidebar">
        <div class="toggle">
          <a href="#" class="js-menu-toggle menu-toggle hover-target" >
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </div>
        <div class="side-inner">
  
          <div class="share">
            <h2>Notícias RSS</h2>
            <div id="noticias" class="not_rss"></div>            
          </div>          
        </div>        
      </aside>
      
      
    <section class="homepage">
        <div id="hero" class="hero">
            <div class="texto container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="h1">
                            <h1><span class="underline--magical">JFarias</span></h1>
                        </div>
                        <div class="texto_hero">
                            <p>Ajudamos a criar a sua marca Digital. Peça um orçamento sem custos.</p>
                            <a href="#sobre_nos"><button class="btn_">Saiba mais</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sobre_nos" class="sobre_nos">
            <div class="container sobrenos_cont">
                <div class="row">
                  <div class="col-lg-6">
                      <div class="subtitle">
                          Sobre nós
                      </div>
                      <div class="divider">
                        <button class="btn_sobre" id="prev"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="btn_sobre" id="next"><i class="fa-solid fa-chevron-right"></i></button>
                      </div>
                      <div class="sobrenos_tit">
                          Sobre a 
                          <br>
                          <h2><span class="underline--magical" id="tit">JFarias</span></h2>
                          <div class="sobre_txt">
                              
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <img src="img/imgsobrenos.jpg" alt="">
                  </div>

                </div>
            </div>
        </div>
        <div id="portfolio" class="portfolio">
            <div class="container">
              <h2><span class="underline--magical">Projetos Recentes</span></h2>
              <div class="thumbnails-wrapper">
                <img src="img/thumbnail-1.jpg" alt="Garage Door Company sample" class="project-thumbnails" data-lity-target="img/project1.png">
                <img src="img/thumbnail-2.jpg" alt="Automotive template sample" class="project-thumbnails" data-lity-target="img/project2.png">
                <img src="img/thumbnail-3.jpg" alt="Construction sample template" class="project-thumbnails" data-lity-target="img/project3.png">
            </div>
            </div>
        </div>
        <div id="orcamento" class="orcamento">
          <div class="container">
            <div class="subtitle sub2">
              PRONTO PARA CRIAR O SEU SITE?
            </div>
              <div class="divider"></div>
            <h2><span class="underline--magical">Orçamentos</span></h2>
          </div>
          <div class="container cont2">
            <div class="row">
              <div class="col-lg-6">
                <h4>Dados</h4>
                <form action="">
                  <p class="p_orca">Nome*</p>
                  <p><input type="text"></p>
                  <p class="p_orca">Apelido*</p>
                  <p><input type="text"></p>
                  <p class="p_orca">Telemovel*</p>
                  <p><input type="text"></p>
                </form>
              </div>
              <div class="col-lg-6">
                <h4>Pedido de orçamento</h4>
                <p class="p_orca">Tipo de página Web*</p>
                <p><select name="options" id="options">
                  <option value="0">Selecione uma opção</option>
                  <option value="300">Landing Page</option>
                  <option value="600">Multi Page</option>
                  <option value="200">Blog</option>
                  <option value="1000">Loja Online</option>
                </select></p>
                <p class="p_orca">Prazo em meses*</p>
                <p><input type="number" id="meses"></p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <h4>Marque os separadores desejados:</h4>
                <div class="row">
                  <div class="col-lg-6">
                    <p class="p_orca">Quem somos<input type="checkbox" class="checkbox" value="400"></p>
                    <p class="p_orca">Onde estamos <input type="checkbox" class="checkbox" value="400"></p>
                    <p class="p_orca">Galeria de Fotos <input type="checkbox" class="checkbox" value="400"></p>
                    <p class="p_orca">eCommerce <input type="checkbox" class="checkbox" value="400"></p>
                  </div>
                  <div class="col-lg-6">
                    <p class="p_orca">Gestão interna <input type="checkbox" class="checkbox" value="400"></p>
                    <p class="p_orca">Noticias<input type="checkbox" class="checkbox" value="400"></p>
                    <p class="p_orca">Redes sociais <input type="checkbox" class="checkbox" value="400"></p>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <h4>Orçamento Estimado:</h4>
              <p class="p_orca">(Valor meramente indicativo, pode sofrer alterações)</p>
              <input type="text" id="result" readonly>
            </div>         
          </div>
        </div>
    </section>
    <div id="map"></div>
    <footer id="contactos" class="contactos">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <img src="img/logo.png" alt="logo_JFarias" width="100px">
            <p id="p_f" class="fot_p">Empresa com foco na excelencia.</p>
            <p class="fot_p">Confie-nos o seu projeto!</p>
          </div>
          <div class="col-lg-4">
            <h3 class="contact">Contactos</h3>
            <p id="p_ff" class="fot_p">Contacto: <a href="tel:+351915590973" class="cont_inf underline">+351 915 590 973</a></p>
            <p class="fot_p">Email: <a href="mailto: joaomfarias@gmail.com" class="cont_inf underline"> joaomfarias@gmail.com</a></p>
          </div>
          <div class="col-lg-4">
            <h3 class="contact">Informações</h3>
              <ul class="inf_list">
                <li>Landing Page</li>
                <li>Multi Page</li>
                <li>Lojas Online</li>
              </ul>              
          </div>
        </div>
        <div class="container cont_divid">          
          <div class="divid"></div>
        </div>
        <div class="container rights">
            <p>© 2023 JFarias. Todos os direitos reservados</p>
        </div>
      </div>
    </footer>
    
    
    <a id="back-to-top" href="#" class="btn btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js?v=<?=filemtime('script.js')?>"></script>
    <script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="javascript/wow.min.js"></script>
    <script src="javascript/lity.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })    

    </script>




  </body>
</html>