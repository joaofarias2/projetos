
$(document).ready(function () {
    var fullPath = window.location.pathname;
    var pageName = fullPath.split('/').pop();

    $('#aside_list ul li a').each(function() {
        if ($(this).attr('href') === pageName) {
            $(this).addClass('active');
        } 
    });    

});    




  
