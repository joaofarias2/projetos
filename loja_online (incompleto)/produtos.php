<?php
    require_once 'Classes/dbh.php';
    require_once 'Classes/Produto.php';
    
    $produtosAll = $produtos->getAll();

       
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <?php include 'include/head.inc.php'; ?>
</head>

<body>
    <div class="overlay"></div>
    <div class="cart_tab">
        <div class="cart_header">
            <div class="cart_tit">
                <h2>O seu carrinho</h2>  
            </div>
            <div class="cart_close">
            <svg id="close_btn_tab" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#27ae60" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </div>
        </div>  
        <div class="list_cart">
            show items here
        </div>
    </div>
    <?php include 'include/header.inc.php'; ?>
    <div class="produtos_content">
        <aside class="aside_menu">
            
        </aside>
        <div class="produtos_lista">
            <div class="ordenar_produtos">
                <p class="ordenar_p"> Ordenar Por : 
                    <select name="" id="ordenar_por">
                        <option value="">Relevância</option>
                        <option value="">Preço (Menor)</option>
                        <option value="">Preço (Maior)</option>
                        <option value="">Nome (A a Z)</option>
                    </select></p>
            </div>
            <div class="produtos_toda_lista">
                <?php
                    foreach ($produtosAll as $p) {
                        echo "<div class='produto'>";
                        echo "<h3>" . $p['nome'] . "</h3>";
                        echo "<p>Preço: " . $p['preco'] . " €</p>";
                        echo "<p>Quantidade: " . $p['quantidade_disponivel'] . " " . "</p>";
                        echo "</div>";
                    }
                ?>
    
            </div>
        </div>
    </div>

    <?php include 'include/footer.inc.php'; ?>
    
    <script src="javascript/script.js"></script>
</body>

</html>