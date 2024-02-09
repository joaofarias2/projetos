<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style src="style.css"></style>
</head>
<body>
    <form action="include/logout.inc.php" method="post">
        <button class="senha_btn">Sair</button>
        <div id="msg">Bem vindo,  <?php echo $_SESSION['user_id']; ?> </div>
    </form>
</body>
</html>