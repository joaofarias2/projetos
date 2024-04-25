$(document).ready(function () {
    var fullPath = window.location.pathname;
    var pageName = fullPath.split('/').pop();

    $('#aside_list ul li a').each(function() {
        if ($(this).attr('href') === pageName) {
            $(this).addClass('active');
        } 
    });



    var currentPage = $('.aside_a.active').find('.span_aside').text();
    $('#page').text('Portal de Atividades / ' + currentPage);

    $(window).on('resize', function() {
        var asideMenu = $('#aside_menu');
        if ($(window).width() <= 1200) {
            asideMenu.hide();
            $('#main').css('width', '100%');
            $('#main').css('margin-left', '0');
        } else {
            asideMenu.show();
            $('#main').css('width', 'calc(100% - 300px)'); 
            $('#main').css('margin-left', '300px');
        }
    });



    $('#tipo').on('change', function() {
        var selectedOption = $(this).val();
        if (selectedOption === '3') {            
            $('#roteiro').prop('disabled', false); 
        } else {
            $('#roteiro').prop('disabled', true).val(''); 
        }
    });

    // Para a pagina editar atividade
    if ($('#tipo').val() === '3') {
        $('#roteiro').prop('disabled', false);
    }



    var modal = $("#myModal");        
    var btn = $("#openModalBtn");
    
    btn.click(function() {
        modal.css("display", "block");
    });

    var span = $(".close");
    span.click(function() {
        modal.css("display", "none");
        $('#password-error').hide();
    });

    $(window).click(function(event) {
        if (event.target == modal[0]) {
            modal.css("display", "none");
        }
    });
   
    function clearPassword() {
        $('#senha').val('');
    }

    $('.delete-btn').click(function () {
        var activityId = $(this).data('activity-id');        
        var form = $('#deleteForm');         

        form.attr('action', 'apagar_atividade.php?id=' + activityId);        
        $('#atividade_id_apagar').val(activityId);
        modal.css('display', 'block'); 
        clearPassword();
    });

    $('#deleteForm').submit(function (e) {
        
        var password = $('#senha').val();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: { senha: password },
            success: function (response) {
                if (response.includes('Senha incorreta')) {
                    $('#password-error').show();
                } else {
                    $('#deleteForm').submit();
                    window.location.href = 'dashboard.php';
                }
            }
        });

        e.preventDefault();
    }); 

    
});    




  
