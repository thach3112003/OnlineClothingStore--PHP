<?php
include '../../classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUser = $_POST['adminUser'];
    $adminPass = md5($_POST['adminPass']);

    $login_check = $class->login_admin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 mb-5 col-xl-4 offset-xl-1">
                    <form action="login.php" method="POST">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        </div>
                        <span>
                            <?php if (isset($login_check)) {
                                echo $login_check;
                            } ?>
                        </span>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter a valid User Name" name="adminUser" />
                            <label class="form-label" for="form3Example3">User name</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" name="adminPass" autocomplete="current-password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary fixed-bottom">
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fa fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fa fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fa fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </section>
</body>

</html>