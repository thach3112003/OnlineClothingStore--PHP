<?php

include('../IvyProject/inc/header.php')
?>

<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script>window.location ='404.php'</script>";
} else {
    $catID = $_GET['catId'];
}
?>
<?php $category_name = $cat->get_category_from_id($catID);
if ($category_name) {
    while ($result = $category_name->fetch_assoc()) {

?>

        <header>
            <title><?php echo $result['catName'] ?></title>
        </header>
        <!--Cartegory-->

        <section class="cartegory">
            <div class="container">
                <div class="d-sm-inline-flex cartegory-top">
                    <p class="pe-3">Trang chủ</p>

                    <span class="pe-3">&#10230; </span>

                    <p class="ms-1"><?php echo $result['catName'] ?></p>

                </div>
            </div>
            <div class="container">
                <!-- Left content -->
                <div class="d-sm-inline-flex w-100">

                    <div class="w-25 cartegory-left pe-3 pb-6">

                        <ul class="navbar-nav flex-grow-1 pe-3">
                            <?php $category = $cat->show_category();
                            if ($category) {
                                while ($result = $category->fetch_assoc()) {

                            ?>
                                    <li class="nav-item cartegory-left-li">
                                        <a class="nav-link"><?php echo $result['catName'] ?></a>
                                    </li>
                            <?php }
                            } ?>
                            <li class="nav-item cartegory-left-li">
                                <a class="nav-link" href="">FLASH SALE</a>
                            </li>
                        </ul>

                    </div>

                    <div class="d-flex d-sm-inline-flex flex-wrap w-100 justify-content-between cartegory-right">
                        <div class="w-100 d-flex group-cartegory-right-top-item">
                            <div class="cartegory-right-top-item pt-2">
                                <?php $category_name = $cat->get_category_from_id($catID);
                                if ($category_name) {
                                    while ($result = $category_name->fetch_assoc()) {

                                ?>
                                        <?php echo $result['catName'] ?>
                                <?php }
                                } ?>
                            </div>
                            <div class="button-cartegory-right-top-item">
                                <button class="d-sm-flex py-2 px-2 justify-content-between button-filter">
                                    <span>Bộ lọc</span><i class="fa fa-sort-down pe-1"></i>
                                </button>
                            </div>
                            <!-- Cartegory -->
                            <div class="ps-5 cartegory-right-top-item">
                                <select class="px-2 sel-cartegory-right-top-item pe-1" name="" id="">
                                    <option value="">Sắp xếp</option>
                                    <option value="">Giá cao đến thấp</option>
                                    <option value="">Giá thấp đến cao</option>
                                </select>
                            </div>
                        </div>
                        <a href="product.php" class="text-decoration-none">
                            <div class="w-100 mt-5 cartegory-right-content">
                                <?php $product_show = $product->get_product_by_category($catID);
                                if ($product_show) {
                                    while ($result = $product_show->fetch_assoc()) {
                                ?>
                                        <div class="cartegory-right-content-item pb-3">
                                            <img src="/admin/uploads/image_product/<?php echo $result['image'] ?>" alt="sp1" />
                                            <h1 class="text-dark"><?php echo $result['productName'] ?></h1>
                                            <p class="text-dark"><?php echo $result['price'] ?><sup>đ</sup></p>
                                        </div>
                                <?php
                                    }
                                } ?>
                            </div>
                        </a>

                    </div>
                    <!-- pagination -->

                </div>
                <div class="catergory-pagination w-100 pt-5 pb-5">
                    <ul class="justify-content-center pagination-sm pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </section>
<?php }
} ?>
<!-- footer -->
<?php
include "inc/footer.php";
?>