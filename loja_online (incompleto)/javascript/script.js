$(document).ready(function () {
    
    var fullPath = window.location.pathname;
    var pageName = fullPath.split('/').pop();

    if (pageName === '') {
        pageName = 'index.php';
    }

    $('.navbar_a').each(function() {
        if ($(this).attr('href') === pageName) {
            $(this).addClass('active');
        }
    });
    


    $('#menu-bar').click(function () {
        this.classList.toggle('fa-times');
        $('.navbar_').toggleClass('active');
    });

    $(window).scroll(function() {
        $('#menu-bar').removeClass('fa-times');
        $('.navbar_').removeClass('active');

        if($(this).scrollTop() > 150) {
            $('.header_2').addClass('active');
        } else {
            $('.header_2').removeClass('active');
        }
    });

    $('.fa-shopping-cart').click(function() {
        $('body').toggleClass('cart_active');
    });

    $('#close_btn_tab').click(function() {
        $('body').removeClass('cart_active');
    });

    $('.overlay').click(function() {
        $('body').removeClass('cart_active');
    });
    
    
});

