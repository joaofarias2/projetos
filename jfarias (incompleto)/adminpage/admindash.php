<?php 
require_once '../include/utils.inc.php';
require_once '../include/dbh.inc.php';
require_once '../include/login_model.inc.php';

$userData = get_user($pdo, $_SESSION['user_id']);


?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/admin_header.php'; ?>

<body>

<?php include '../include/admin_nav.php';   ?>

<section class="hero container-fluid">
   <div id="ss">
      <div class="row">
          <div class="col-md-4 mt-1 profile_sidebar">
          
              <?php include '../include/admin_sidebar.php'; ?>
          </div>
          <div class="col-md-8 mt-1 dynamic-content">
            <div class="card mb-3 p-5">
              <h2>Perfil</h2>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <h5>Nome Completo</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                      <?php echo $usernome; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Email</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                     <?php echo $userData['user_email'];?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Telefone</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                  <?php echo $usertel; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Morada</h5>
                  </div>
                  <div class="col-md-9 text-secondary">
                    <?php echo $usermorada; ?>
                  </div>
                </div>
              </div>
            </div>            
          </div>
      </div>

   </div>
</section>
    
</body>

<a id="back-to-top" href="#" class="btn btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js?v=<?=filemtime('script.js')?>"></script>
    <script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="javascript/wow.min.js"></script>
    <script src="javascript/lity.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            function loadContent(page) {
                $.ajax({
                    type: "GET",
                    url: page,
                    success: function (data) {
                        $(".dynamic-content").html(data);
                    }
                });
            }

            
            $("#inicio").click(function () {
                var page = $(this).data("page");
                loadContent(page);
            });

            $("#utilizadores").click(function () {
                var page = $(this).data("page");
                loadContent(page);
            });
        });
    </script>
</html>