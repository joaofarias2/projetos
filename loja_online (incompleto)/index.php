<?php
    require_once 'Classes/dbh.php';
    require_once 'Classes/Produto.php';
    $produtos = new Produto($conn);
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


<section class="home" id="home">
    <div class="image">
        <img src="image/home_image1.png" alt="mercearia">
    </div>

    <div class="content">
        <span>A sua Mercearia Favorita.</span>
        <h3>Os produtos mais frescos!!</h3>
        <a href="produtos.php" class="btns">Ver Produtos</a>
    </div>
</section>

<section class="produtos" id="produtos">
    <h2>Os nossos Produtos</h2>
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide card">
                <img src="image/produtos/laranjas.png" alt="laranjas">
                <div class="content">
                    <h3>Laranjas</h3>
                    <span>Preço: 10.00€/Kg</span>
                </div>
                <a href="#" class="btns">Adicionar ao Carrinho</a>
            </div>
            <div class="swiper-slide card">
                <img src="image/produtos/laranjas.png" alt="laranjas">
                <div class="content">
                    <h3>Laranjas</h3>
                    <span>Preço: 10.00€/Kg</span>
                </div>
                <a href="#" class="btns">Adicionar ao Carrinho</a>
            </div>
            <div class="swiper-slide card">
                <img src="image/produtos/laranjas.png" alt="laranjas">
                <div class="content">
                    <h3>Laranjas</h3>
                    <span>Preço: 10.00€/Kg</span>
                </div>
                <a href="#" class="btns">Adicionar ao Carrinho</a>
            </div>
            <div class="swiper-slide card">
                <img src="image/produtos/laranjas.png" alt="laranjas">
                <div class="content">
                    <h3>Laranjas</h3>
                    <span>Preço: 10.00€/Kg</span>
                </div>
                <a href="#" class="btns">Adicionar ao Carrinho</a>
            </div>
            <div class="swiper-slide card">
                <img src="image/produtos/laranjas.png" alt="laranjas">
                <div class="content">
                    <h3>Laranjas</h3>
                    <span>Preço: 10.00€/Kg</span>
                </div>
                <a href="#" class="btns">Adicionar ao Carrinho</a>
            </div>
            <div class="swiper-slide card">
                <img src="image/produtos/laranjas.png" alt="laranjas">
                <div class="content">
                    <h3>Laranjas</h3>
                    <span>Preço: 10.00€/Kg</span>
                </div>
                <a href="#" class="btns">Adicionar ao Carrinho</a>
            </div>
        </div>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</section>

<section class="banner_container">
    <div class="banner">
        <a href="" class="btns" id="btn_banner_carne">Aproveite Já</a>
    </div>
</section>

<section class="categorias">
    <h2>Categorias</h2>

    <div class="categorias_circ_wrapper">
        <div class="categorias_circ">
            <h3>Frescos</h3>
            <img src="image/produtos_frescos.png" alt="">
        </div>
        <div class="categorias_circ">
            <h3>Congelados</h3>
            <img src="image/congelados.png" alt="">
        </div>
        <div class="categorias_circ">
            <h3>Lacticinios e Ovos</h3>
            <img src="image/ovos.png" alt="">
        </div>
        <div class="categorias_circ">
            <h3>Bebés</h3>
            <img src="image/fraldas.png" alt="">
        </div>
    </div>

</section>

<?php include 'include/footer.inc.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="javascript/script.js"></script>
<script>
    var swiper = new Swiper('.swiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            560: {
                slidesPerView: 2,
                spaceBetween: 10
            },
            960: {
                slidesPerView: 4,
                spaceBetween: 10
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 10
            }
        },
    });
</script>

</body>
</html>
