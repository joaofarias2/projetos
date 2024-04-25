<!DOCTYPE html>
<html lang="pt">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadinho - Admin Login</title>

    <link rel="icon" href="image/favicon/favicon.ico" type="image/x-icon">    
    <link rel="stylesheet" href="css/login1.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>  
    
</head>
<body>
    <div class="container login_container">
        <div class="login">
            <h1>Admin Login</h1>

            <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
            <form class="login-form" method="POST">
                    <label class="login_label">Username</label>                    
                    <div class="colu">
                        <input type="text" name="username" class="login_input effect-7">
                        <span class="focus-border">
            	            <i></i>
                        </span>
                    </div>                    

                    <label class="login_label">Password</label>
                    <div class="colu">
                        <input type="password" name="password" class="login_input effect-7">
                        <span class="focus-border">
            	            <i></i>
                        </span>
                    </div>

                    <button type="submit" id="login_btn">Login</button>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script>
    $('.login-form').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'include/login.inc.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = 'admin_dashboard.php';
                } else {
                    $('#error-message').text(response.error).removeClass('d-none');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
</script>
</body>
</html>