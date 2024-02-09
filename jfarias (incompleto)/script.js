$(document).ready(function () {    
  
  // Janela de Alert  
  /*setTimeout(function alerta(){
        alert('Bem vindo ao WebSite!!')
  }, 5000);*/
  

  // Navbar 
  $(window).scroll(function () {
    var $this = $(this),
        $head = $('.navbar');
    if ($this.scrollTop() > 120) {
        $head.addClass('fixed_header');
        $('.nav-link').addClass('link_a');
        $('.nav-link').addClass('change');
        $("#my_img").attr("src","img/png/logo-no-background-black.png");
        $('#back-to-top').fadeIn();
        $('.cadastrar').addClass('cad_d');     
    } else {
        $head.removeClass('fixed_header');
        $("#my_img").attr("src","img/logo.png");
        $('.nav-link').removeClass('link_a');
        $('.nav-link').removeClass('change');
        $('#back-to-top').fadeOut();
        $('.cadastrar').removeClass('cad_d');  
    }
  });

  // btn entrar/cadastrar

  $('#cadastro').on('click', function () {
    $('.hiden_nav').toggle();
  });


  $(document).on('click', function (event) {
      var $target = $(event.target);
      if (!$target.closest('.navbar_loginbtn').length) {
          $('.hiden_nav').hide();
      }
  });

  // Scroll to top
  $('#back-to-top').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 100);
    return false;
  });

  // sidebar
  $('.js-menu-toggle').click(function(e) {

  	var $this = $(this); 	

  	if ( $('body').hasClass('show-sidebar') ) {
  		$('body').removeClass('show-sidebar');
  		$this.removeClass('active');
  	} else {
  		$('body').addClass('show-sidebar');	
  		$this.addClass('active');
  	}

  	e.preventDefault();

  });

	$(document).mouseup(function(e) {
    var container = $(".sidebar");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('show-sidebar') ) {
				$('body').removeClass('show-sidebar');
				$('body').find('.js-menu-toggle').removeClass('active');
        console.log('ss')
			}
    }
	});


  // esconder sidebar (less then 960)
  $(window).resize(function() {
    if ($(window).width() < 960) {
       $('.menu-toggle').css('display', 'none')
    }
   else {
    $('.menu-toggle').css('display', 'flex')
   }
  });

  // noticias RSS

  var rssFeedUrl = 'news-rss.xml';
            $.ajax({  
                url: rssFeedUrl,
                type: 'GET',
                dataType: 'xml',
            success: function(data) {    
                $(data).find("item").each(function() {
                    var title = $(this).find("title").text();
                    var link = $(this).find("link").text();
                    var description = $(this).find("description").text();                    
                
                    $("#noticias").append("<a href=' " + link + "' id='not_tit'>" + title + "</a><p id='not_desc'>" + description + "</p><hr id='hr_not'>");
                    
                });
                
            },
            error: function(xhr, status, error) {
                console.error("Error loading RSS feed: " + error);
            }
  })

  // get txt with AJAX

  var currentPage = 1;
  
  function fetchContent(page) {
    $.ajax({
      url: 'sobrenostxt' + page + '.html', 
      type: 'GET',
      success: function(data) {
        $('.sobre_txt').fadeOut(300, function() {
          $('.sobre_txt').html(data).fadeIn(300);
        });
      }
    });
  }

  fetchContent(currentPage);

  $('#prev').on('click', function() {
    if (currentPage > 1) {
      currentPage--;
    } else {
      currentPage = 2; 
    }
    fetchContent(currentPage);
  });

 
  $('#next').on('click', function() {
    if (currentPage < 2) { 
      currentPage++;
    } else {
      currentPage = 1; 
    }
    fetchContent(currentPage);
  });


  // streetviewmaps

 var map = L.map('map').setView([51.505, -0.09], 13);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  navigator.geolocation.watchPosition(sucess, error)
  var mark = new L.Marker([37.091191, -8.241543]);
  mark.addTo(map);
  mark.bindPopup('JFarias').openPopup();
  let marker, circle, zoomed

  function sucess(pos){
    const lat = pos.coords.latitude
    const lng = pos.coords.longitude
    const accuracy = pos.coords.accuracy
    if(marker){
      L.Routing.control({
        waypoints: [
          L.latLng(lat, lng),
          L.latLng(37.091191, -8.241543)
        ]
      }).addTo(map);
        map.removeLayer(marker)
        map.removeLayer(circle)
    }
     marker = L.marker([lat, lng]).addTo(map)
     circle = L.circle([lat, lng, {radius: accuracy}]).addTo(map)

    if(!zoomed){
      zoomed = map.fitBounds(circle.getBounds())
    }

    map.setView([lat, lng ])
    
    
  }

  function error(err) {
    if(err.code === 1){
      alert('Por favor permita o acesso a sua localização!')
    } else{
      alert('Nao foi possivel obter a sua localização')
    }
  } 

  

  // validar campos do orcamento

  var sum = 0;
  var selectedOptionValue = 0;
  var desc = 0;

  function updateSum() {
      sum = 0;
      $(".checkbox:checked").each(function () {
          sum += parseInt($(this).val());
      });
  }

  function updateSelectedOption() {
      selectedOptionValue = $("#options").val();
  }

  function updateNMonths(){
    var nMeses = $("#meses").val();    
    if(nMeses == 1){
      desc = 5;
    } else if(nMeses == 2){
      desc = 10;
    } else if(nMeses == 3){
      desc = 15;
    } else if((nMeses >= 4)){
      desc = 25;
    } else {
      desc = 0;
    }
  }

  function updateCombinedResult() {
      var combinedResult = sum + parseInt(selectedOptionValue);
      var result = combinedResult - (combinedResult * (desc / 100));
      $("#result").val(result + '€');
  }

  $(".checkbox").change(function () {
      updateSum();
      updateNMonths();
      updateCombinedResult();
      
  });

  $("#options").change(function () {
      updateSelectedOption();
      updateNMonths();
      updateCombinedResult();
  });

  $('#meses').change(function () {
    updateSelectedOption();
    updateNMonths();
    updateCombinedResult();
});


// SIGN UP/ LOGIN MODAL

$('#showModal, #login').on('click', function () {
  showDiv('ins_modal_login'); 
  $('.modal_login').show();
  $('.modal_content').show();
});

// Define showDiv function
window.showDiv = function(divId) {
  $('.ins_modal_login, .ins_modal_senha, .ins_modal_registar').hide();
  $('#' + divId).show();
  return $('#' + divId).is(':visible');
};

window.goBackToLogin = function() {
  showDiv('ins_modal_login');
  $('.back_arrow').css('visibility', 'hidden');
};

$(document).on('click', '.back_arrow', function() {
  goBackToLogin();
});

// Define closeModal function
window.closeModal = function() {
  showDiv('ins_modal_login');
  $('.back_arrow').css('visibility', 'hidden');
  $('.modal_login').hide();
  $('.modal_content').hide();
};

// Bind click event for span element
$(document).on('click', '#registar_link', function() {
  showDiv('ins_modal_registar')
  var insRegistar = showDiv('ins_modal_registar');

  if (insRegistar) {
    $('.back_arrow').css('visibility', 'visible');
  }
})

// Bind click event for closing the modal
  $(document).on('click', function(event) {  
    if ($(event.target).is('#modal') || $(event.target).is('.close_btn')) {
     closeModal(); 
    }
  });  

// Bind keydown event for closing the modal on Escape key
$(document).on('keydown', function(event) {
  if (event.key === 'Escape') {
    closeModal();
  }
});

// Check se o id e pw estao ins para dar enable no botao
$('#username, #password').on('input', function () {
  // Check if both fields have values
  var userIDValue = $('#username').val();
  var passwordValue = $('#password').val();

  if (userIDValue.length > 0 && passwordValue.length > 0) {
      $('.login_btn').addClass('enabled').prop('disabled', false);
  } else {
      $('.login_btn').removeClass('enabled').prop('disabled', true);
  }
});
})

function validateSignup(){
                   
  var postData = $('#signupForm').serialize();

  $.ajax({
      url: "include/signup.inc.php",
      type: 'POST',
      data: postData,
      success: function(data) {
          data = JSON.parse(data);
          if(data.success == false){
            var errors = ""
            $.each(data.errors, function (key,val   ) {
              errors+= "- "+val+"<br>";
            });
            $('#singup-errors').html(errors);
          } else {
            closeModal();
            alert("Registo efetuado com sucesso!")
          }
        }
  }); 
}

function valLogin(){
                   
  var postData = $('#loginForm').serialize();

  $.ajax({
      url: "include/login.inc.php",
      type: 'POST',
      data: postData,
      success: function(data) {
          data = JSON.parse(data);
          if(data.success == false){
            var errors = ""
            $.each(data.errors, function (key,val   ) {
              errors+= "- "+val+"<br>";
            });
            $('#login-errors').html(errors);
          } else {
            window.location.href = "include/login.php";
          }
        }
  }); 
}




 