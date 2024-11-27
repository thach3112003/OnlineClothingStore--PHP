<?php
include '../../config/config.php';
include '../../classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUser = $_POST['adminUser'];
    $adminPass = $_POST['adminPass'];

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
        <!-- Email input -->
        <div class="login-box">
            <h2>ADMIN LOGIN</h2>
            <form action="login.php" method="POST">
                <span>
                    <?php if (isset($login_check)) {
                        echo $login_check;
                    } ?>
                </span>
                <div class=" user-box">
                    <input type="text" name="adminUser" required>
                    <label for="">Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="adminPass" required>
                    <label for="">Password</label>
                </div>
                <button type="submit" href="">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>Submit
                </button>
            </form>
        </div>
        </form>
    </section>
</body>

</html>