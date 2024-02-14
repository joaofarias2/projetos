$(document).ready(function() {
    $('.view-notice').click(function(){
        var noticeId = $(this).data('target');        
        $.ajax({
            type: "post",
            url: "get_notice.php",
            data: {id: noticeId},
            dataType: "json",
            success: function (response) {
                $('#content_noticia').html(response.noticias_titulo);
            }, 
            error: function (response) {
                console.log(response);
            }
        });
    });
});