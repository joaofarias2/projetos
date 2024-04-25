<?php 
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';
require_once '../include/compromissos.php';
require_once '../include/insert_notice.php';

$userData = get_user($pdo, $_SESSION['user_id']);

$noticia = get_notice($pdo);

$stmt2 = $pdo->query("SELECT * FROM tbl_noticias ORDER BY id_noticias DESC LIMIT 4");
$lastNot = $stmt2->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/user_header.php'; ?>
<link rel="stylesheet" href="../css/user_noticias.css">
<style>
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgba(0,0,0,0.4); 
    }

    
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 30%; 
    }

    
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .not_container{
        display: flex;
        flex-direction: row;
        align-items: center;
    
    }

    .not_container img{
        margin-right: 50px;
    }

    .container{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        margin: 200px auto; 
    }
             
    
</style>

<body>
    <?php include '../include/user_nav.php'; ?>
    
<div class="container">
    <?php foreach ($lastNot as $noticia): ?>
    <div class="card">
        <div class="card__header">
            <img src="../uploads/<?php echo $noticia['noticias_imagem']; ?>" alt="card__image" class="card__image" width="400" height="200">
        </div>
        <div class="card__body">
            <h4><?php echo $noticia['noticias_titulo']; ?></h4>
            <p><?php echo $noticia['noticias_texto']; ?></p>
        </div>
        <div class="card__footer">
            <div class="user">
                <a href="#" class="btn btn-primary openModalBtn">Ver Noticia</a>
            </div>
        </div>
    </div>

    <!-- Modal for this notice -->
    <div class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2><?php echo $noticia['noticias_titulo']; ?></h2>
            <hr>
            <div class="not_container">
                <img src="../uploads/<?php echo $noticia['noticias_imagem']; ?>" alt="Noticia Image" width="100px">
                <p><?php echo $noticia['noticias_texto']; ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
    
</body>

<script>
   
    var btns = document.querySelectorAll('.openModalBtn');
    var modals = document.querySelectorAll('.modal');
    var spans = document.querySelectorAll(".close");

    
    btns.forEach(function(btn, index) {
        btn.onclick = function() {
            modals[index].style.display = "block"; 
        }
    });

    
    spans.forEach(function(span, index) {
        span.onclick = function() {
            modals[index].style.display = "none";
        }
    });

    
    window.onclick = function(event) {
        modals.forEach(function(modal) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>

</html>
<a ></a>