<section class="newsletter"> 
    <h2>Subscreva a nossa Newsletter</h2>
    <form class="newsletter-form" action="" method="POST"> 
        <input type="email" id="email" name="email" placeholder="Seu e-mail...">
        <button type="submit" class="btns btn_news">Inscrever-se</button>
    </form>
</section>

<div class="container-fluid p-0">
  <footer class="text-center text-lg-start text-white" style="background-color: #45526e">
    <div class="container p-4 pb-0">
      <section class="">
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
                <i class="fas fa-shopping-basket"></i> Mercadinho
            </h6>
            <p>
              Aqui pode encontrar tudo o que precisa para a sua casa. Todos os produtos são de qualidade e a preços acessíveis.
            </p>
          </div>
          <hr class="w-100 clearfix d-md-none" />

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
                Links
            </h6>
            <p>
              <a class="text-white">Carrinho</a>
            </p>
            <p>
              <a class="text-white">Podutos</a>
            </p>
            <p>
              <a href="login_admin.php" class="text-white" target="_blank">Admin Page</a>
            </p>
          </div>

          <hr class="w-100 clearfix d-md-none" />

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contactos</h6>
            <p><i class="fas fa-home mr-3"></i> Rua Manuel José Paiva, Lt 11 </p>
            <p><i class="fas fa-envelope mr-3"></i> joaomfarias1@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> +351 915 590 973</p>
          </div>
        </div>
      </section>

      <hr class="my-3">

      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <div class="p-3">
              © 2024 Copyright:
              <a class="text-white"> Mercadinho </a>
            </div>
          </div>

          <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
            <a href="https://www.facebook.com/" target="_blank" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.google.com/" target="_blank" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-google"></i></a>
            <a href="https://www.instagram.com/" target="_blank" class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </section>
    </div>
  </footer>
</div>

<script>         
        toastr.options = {
            "closeMethod" : 'fadeOut',
            "closeDuration" : 200,
            "closeEasing" : 'swing',
            "positionClass": "toast-top-right"
        };
</script> 

<script>

    $('.newsletter-form').on('submit', function(event) {
        event.preventDefault(); 

        var formData = new FormData(this);
        var emailInput = $('#email');

        $.ajax({
            type: 'POST',
            url: 'include/submit_newsletter.inc.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                if (data.success == true) {
                  toastr.success(data.message);
                  emailInput.val('');
                } else {
                  toastr.error(data.message);
                }
            },
            error: function(xhr, status, error) {
                toastr.error('Error: ' + error);
            }
        });;
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
