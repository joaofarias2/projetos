<?php
    require_once 'include/dbh.inc.php';
    
    if (isset($_GET['error'])) {        
        $encoded_errors = $_GET['error'];
        $decoded_errors = urldecode($encoded_errors);
        // Adicionar line break para cada erro
        $decoded_errors = str_replace(",", "<br>", $decoded_errors);       
    }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrupamento de Escolas João de Deus - Login</title>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">    
    <script src="https://kit.fontawesome.com/3b5f6d3e6a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="scripts/login.js"></script>    
    <link rel="stylesheet" href="styles/login.css">
    
</head>
<body>
    <div class="container login_container">
        <div class="login">
            <h1>Fazer Login</h1>
            <form class="login-form" action="include/login.inc.php" method="POST">
                    <label class="login_label">Username</label>                    
                    <div class="colu">
                        <input type="text" name="username" class="login_input effect-7">
                        <span class="focus-border">
            	            <i></i>
                        </span>
                    </div>                    

                    <label class="login_label">Password</label>
                    <div class="colu">
                        <input type="password" name="password" class="login_input effect-7">
                        <span class="focus-border">
            	            <i></i>
                        </span>
                    </div>

                    <button type="submit" id="login_btn">Login</button>
                    <?php if(isset($decoded_errors)){ ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $decoded_errors ; ?> 
                        </div>
                    <?php } ?>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>