<?php
require "php_files/classes/App.php";

$app = new App();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>

    <?php
    include("php_files/header_links.php");
    ?>

</head>
<body>
<?php
include("php_files/header_navbar.php");
?>
<form method="post">
<section class="vh-150 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">Sign up</h2>
                            <p class="text-white-50 mb-5">Please create an account!</p>

                            <div class="form-outline form-white mb-4">
                                <h5>Login:</h5>
                                <input type="login" name="login_inp" class="form-control form-control-lg" value="<?php echo @$_POST['login_inp']; ?>" />

                            </div>
                            <div class="form-outline form-white mb-4">
                                <h5>Email:</h5>
                                <input type="email" name="email_inp" class="form-control form-control-lg" value="<?php echo @$_POST['email_inp']; ?>"/>

                            </div>

                            <div class="form-outline form-white mb-4">
                                <h5>Password: </h5>

                                <input type="password" name="password_inp" class="form-control form-control-lg" value="<?php echo @$_POST['password_inp']; ?>" />

                            </div>
                            <div class="form-outline form-white mb-4">
                                <h5>Retype your password: </h5>

                                <input type="password" name="password2_inp" class="form-control form-control-lg" value="<?php echo @$_POST['password2_inp']; ?>" />

                            </div>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name='signup' >Sign up</button>



                        </div>

                        <div>
                            <p class="mb-0">Do you have an account? <a href="login.php" class="text-white-50 fw-bold">Login</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
</body>
</html>

