<!DOCTYPE html>
<html lang="pt">
<head>
    <?php include 'include/head.inc.php'; ?>
</head>

<body>
<header>
    <div class="header_1">
        <a href="index.php" class="logo"><i class="fas fa-shopping-basket"></i>Mercadinho</a>
        <form action="" class="search_box_container">
            <input type="search" id="search_box" placeholder="Pesquisar produtos...">
            <button type="submit" id="search_button"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="header_2">

        <div id="menu-bar" class="fas fa-bars"></div>

        <nav class="navbar_">
            <a class="navbar_a" href="index.php">Inicio</a>
            <a class="navbar_a" href="produtos.php">Produtos</a>
            <a class="navbar_a" href="contactos.php">Contactos</a>
        </nav>

    </div>
</header>

<?php include 'include/footer.inc.php'; ?>
    <script src="javascript/script.js"></script>
</body>

</html>