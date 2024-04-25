<?php
    require_once 'include/utils.inc.php';
    require_once 'include/dbh.inc.php'; 
    require_once 'include/db_query.php'; 

    $userData = get_user($pdo, $_SESSION['user']);
    $userType = $userData['is_admin'];     
    $atividades = get_atividades($pdo);

    define('ATIVIDADE', 0);
    define('PROJETO', 1);
    
    $tipoAtividades = [
        ATIVIDADE => "Atividade",
        PROJETO => "Projeto",
        2 => "Clube",
        3 => "Visita de Estudo",
    ]; 
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrupamento de Escolas João de Deus - Dashboard</title>

    <link rel="icon" href="img/favicon.png" type="image/x-icon">    
    <script src="https://kit.fontawesome.com/b03b1de26b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>         
        toastr.options = {
            "closeMethod" : 'fadeOut',
            "closeDuration" : 200,
            "closeEasing" : 'swing',
            "positionClass": "toast-bottom-right"
        };
    </script>       
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <?php 
        if (isset($_SESSION['success_message'])) {
            echo "<script>toastr.success('".$_SESSION['success_message']."')</script>";
        
            unset($_SESSION['success_message']);
        }
    ?>
    <aside id="aside_menu">
        <div id="aside_logo">
            <img src="img/logoes.png" alt="logo_esjoaodedeus" width="150px">
        </div>
        <hr id="aside_hr">
        <div id="aside_list">
            <ul>
                <li>
                    <a class="aside_a" href="dashboard.php">
                        <div class="icon_svg_aside">
                            <svg width="25px" height="25px" viewBox="0 0 24 24">
                                <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Building" transform="translate(-96.000000, 0.000000)">
                                        <g id="home_2_line" transform="translate(96.000000, 0.000000)">
                                            <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                                            </path>
                                                            <path class="icons_svg" d="M10.7722,2.68814 C11.4944,2.12641 12.5057,2.12641 13.2279,2.68814 L21.6117,9.20884 C22.3648,9.79463 21.9492,11 20.9971,11 L20.0001,11 L20.0001,19 C20.0001,20.1046 19.1046,21 18.0001,21 L6.00005,21 C4.89548,21 4.00005,20.1046 4.00005,19 L4.00005,11 L3.00297,11 C2.04989,11 1.63605,9.79401 2.38841,9.20884 L10.7722,2.68814 Z M5.62546,9.22486 C5.85399,9.41004 6.00005,9.69297 6.00005,10.01 L6.00005,19 L18.0001,19 L18.0001,10.01 C18.0001,9.69295 18.1461,9.41003 18.3746,9.22486 L12.0001,4.26685 L5.62546,9.22486 Z" >
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="span_aside">Inicio</span>
                    </a>
                </li>
                <li>
                    <a class="aside_a" href="criar_atividade.php">
                        <div class="icon_svg_aside">                    
                            <svg  width="25px" height="25px" viewBox="0 0 16 16"><path class="icons_svg" d="M14.25 10.71 11.57 8l2.26-2.26a2.49 2.49 0 0 0 0-3.53 2.5 2.5 0 0 0-3.53 0l-.89.88L8 4.5 5.28 1.75a1.26 1.26 0 0 0-1.76 0L1.75 3.52a1.25 1.25 0 0 0 0 1.77L4.5 8l-.22.22-.89.88-1.75 3.66a1.25 1.25 0 0 0 1.67 1.67l3.62-1.75.49-.49.39-.39.19-.23 2.68 2.68a1.26 1.26 0 0 0 1.76 0l1.77-1.77a1.25 1.25 0 0 0 .04-1.77zm-2.19-8a1.27 1.27 0 0 1 .89.36 1.25 1.25 0 0 1 0 1.77l-1.77-1.72a1.27 1.27 0 0 1 .88-.36zM2.63 4.4 4.4 2.64l.82.82-.87.88.88.88.88-.88 1 1-1.73 1.81zm.13 8.91 1.57-3.23L6 11.74zm4.17-2.4L5.16 9.14 10.3 4l1.76 1.76zm4.67 2.45-2.68-2.67 1.77-1.77.93.93-.88.88.88.89.89-.89.86.87z"/></svg>
                        </div>
                        <span class="span_aside">Criar Atividade</span>
                    </a>
                </li>
            </ul>
            
        </div>
    </aside>
    <main id="main">
        <nav id="my_navbar" class="navbar-expand-lg">
            <div id="navbar_wrapper">
                <div id="page"></div>
                <div id="nav_right">
                    <div id="user_id">
                        <span><?php echo $userData['escola_nome']; ?></span>
                    </div>
                    <div id="logout">
                        <a href="include/logout.inc.php">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i></a> 
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid conteudo">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 tabela_search">
                        <div class="card-header pb-0">
                            <h5>Pesquisar</h5>
                        </div>
                        <div class="card-body px-0 pt-0 ">                            
                            <div class="col-4">
                                <form action="" method="GET" class="d-flex search_form">
                                    <input  class="form-control me-2" type="search" placeholder="Procurar atividade pelo nome" aria-label="Search" name="procurar_nome">
                                    <button class="btn botao_procurar" type="submit">Procurar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 tabela_atividades">
                        <div class="card-header pb-0">
                            <h5>Atividades</h5>
                        </div>
                        <div class="card-body px-0 pt-0 ">
                            <div class="table-responsive ">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="th" id="first_table_name">Tipo de Atividade</th>
                                            <th class="th">Titulo</th>
                                            <th class="th">Data Inicio</th>
                                            <th class="th">Escola</th>
                                            <th class="th"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if (isset($_GET['procurar_nome'])) {
                                            $searchQuery = $_GET['procurar_nome'];
                                            $atividadesNome = get_atividades_nome($pdo, $searchQuery);

                                            if(empty($atividadesNome)) {
                                                echo "<tr><td colspan='5' id='erro_sem_atividade'>Nenhuma atividade encontrada</td></tr>";
                                            } else {
                                                foreach ($atividadesNome as $atividade):                                                  
                                                        $canEdit = $userType == 1 || $atividade['atividade_escola_id'] == $userData['escola_id'];
                                                    ?>
                                                    <tr id="atividades_tabela_custom">                                                  
                                                        <td><?php echo $tipoAtividades[$atividade['tipo_atividade']]; ?></td>
                                                        <td><?php echo $atividade['titulo_atividade']; ?></td>
                                                        <td><?php echo $atividade['inicio_atividade']; ?></td>
                                                        <td><?php echo get_school_name($pdo, $atividade['atividade_escola_id']); ?></td>
                                                        <td>                                                    
                                                        <?php if($canEdit): ?> 
                                                            <a href="editar_atividade.php?id=<?php echo htmlspecialchars($atividade['atividades_id']); ?>" class="btn btn-primary">Editar</a> 
                                                        <?php endif; ?>
                                                            <?php if($userType == 1): ?>                                                        
                                                                <button class="btn btn-danger delete-btn" id="openModalBtn" data-activity-id="<?php echo $atividade['atividades_id']; ?>">Apagar</button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;
                                            }
                                        } else {
                                            foreach ($atividades as $atividade): ?>
                                            <?php 
                                                $canEdit = $userType == 1 || $atividade['atividade_escola_id'] == $userData['escola_id'];
                                            ?>
                                            <tr id="atividades_tabela_custom">                                                  
                                                <td><?php echo $tipoAtividades[$atividade['tipo_atividade']]; ?></td>
                                                <td><?php echo $atividade['titulo_atividade']; ?></td>
                                                <td><?php echo $atividade['inicio_atividade']; ?></td>
                                                <td><?php echo get_school_name($pdo, $atividade['atividade_escola_id']); ?></td>
                                                <td>                                                    
                                                <?php if($canEdit): ?> 
                                                    <a href="editar_atividade.php?id=<?php echo htmlspecialchars($atividade['atividades_id']); ?>" class="btn btn-primary">Editar</a> 
                                                <?php endif; ?>
                                                    <?php if($userType == 1): ?>                                                        
                                                        <button class="btn btn-danger delete-btn" id="openModalBtn" data-activity-id="<?php echo $atividade['atividades_id']; ?>">Apagar</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                         <?php endforeach; }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>          
    </main>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>Deseja Apagar a Atividade?</p>
            <p>Digite a senha:</p>
            <form action="apagar_atividade.php" method="POST" id="deleteForm">
                <input type="hidden" name="id" id="atividades_id_apagar">
                <input type="password" name="senha" id="senha">
                <button type="submit" class="btn botao_apagar">Apagar</button> <span class="btn botao_procurar close">Cancelar</span>
            </form>
            <div id="password-error" class="alert alert-danger" role="alert" style="display: none;">Senha incorreta</div>
        </div>
    </div>
    <script src="script/dashboard.js"></script>
    
</body>
</html>