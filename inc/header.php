<?php
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/..');
}
include(BASE_PATH . '/lib/session.php');
include(BASE_PATH . '/config/config.php');
Session::init();
?>

<?php
header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<?php
include_once(BASE_PATH . '/lib/database.php');
include_once(BASE_PATH . '/helpers/format.php');
include_once(BASE_PATH . '/classes/addProduct.php');
include_once(BASE_PATH . '/classes/cart.php');
include_once(BASE_PATH . '/classes/category.php');
include_once(BASE_PATH . '/classes/user.php');

$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cat = new category();
$product = new product();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/cartegory.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/css_bootstrapPart.css" />
    <link rel="stylesheet" href="../css/product.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/css_bootstrapPart.css" />
    <script src="../js/script-main.js"></script>
</head>

<body>
    <!-- header with bootstrap 5 -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a href="../index.php" class="navbar-brand me-auto"><img src="../image/DOSIANHTU.png" width="130%"
                    height="auto" alt="Logo" /></a>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <img src="../image/logo.png" alt="Logo" />
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a href="" class="nav-link mx-lg-2 active" aria-current="page">HOME</a>
                        </li>
                        <?php $category = $cat->show_category();
                        if ($category) {
                            while ($result = $category->fetch_assoc()) {

                        ?>
                                <li class="nav-item">
                                    <a href="category.php?catId=<?php echo $result['catId'] ?>"
                                        class="nav-link mx-lg-2"><?php echo $result['catName'] ?></a>
                                </li>
                        <?php
                            }
                        }
                        ?>

                        <li class=" nav-item">
                            <a href="" class="nav-link mx-lg-2">THÔNG TIN</a>
                            <div class="nav-item nav-item-submenu"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <a class="me-3 search-place d-flex t333-p text-decoration-none">
                <input placeholder="Tìm kiếm..." type="text" /><i class="fa fa-search"></i>
            </a>
            <a href="" class="shop-cart fa fa-shopping-cart"></a>
            <a href="" class="login-button fa fa-user"></a>
            <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- End header with bootstrap 5 -->