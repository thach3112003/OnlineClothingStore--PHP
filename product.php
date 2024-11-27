<?php
include 'inc/header.php';
?>
<header>
    <title>Sản phẩm</title>
</header>
<?php
if (!isset($_GET['productId']) || $_GET['productId'] == NULL) {
    echo "<script>window.location ='404.php'</script>";
} else {
    $id = $_GET['productId'];
}
?>


<!---------------------------- Product -------------------------->
<section class="s-product">
    <div class="container">
        <?php $get_catName = $cat->get_category();
        if ($get_catName) {
            while ($result = $get_catName->fetch_assoc()) {
        ?>
        <div class="d-sm-inline-flex product-top">
            <p>Trang chủ</p>
            <span>&#10230; </span>
            <p class="ms-1 me-1">Nữ</p>
            <span>&#10230; </span>
            <p class="ms-1 me-1">Hàng nữ mới về</p>
            <span>&#10230; </span>
            <p class="ms-1 me-1">Đầm họa tiết mã số 0011</p>
        </div>
        <?php }
        }
        ?>

        <?php
        $get_product_details = $product->get_details_product($id);
        if ($get_product_details) {
            while ($result_details =  $get_product_details->fetch_assoc()) {

        ?>
        <div class="product-content w-100 d-inline-flex">
            <!-- Left: image(big and small) -->

            <div class="product-content-left d-inline-flex w-50">
                <div class="product-content-left-bigImg pt-5 w-80 pe-3">
                    <img width="380" src="admin/uploads/image_product/<?php echo $result_details['image'] ?>"
                        alt="Ảnh sản phẩm" />
                </div>
                <!-- <div class="product-content-left-smallImg w-20">
                    <i class="fa fa-chevron-up pb-3 d-flex justify-content-center"></i>
                    <img src="../image/sp1.webp" alt="Ảnh sản phẩm" />
                    <img src="../image/sp2.webp" alt="Ảnh sản phẩm " />
                    <img src="../image/sp3.webp" alt="Ảnh sản phẩm w-20" />
                    <img src="../image/sp4.webp" alt="Ảnh sản phẩm " />
                    <i class="fa fa-chevron-down fa fa-chevron-up d-flex justify-content-center pt-3"></i>
                </div> -->
            </div>
            <!-- Right: text -->
            <div class="product-content-right ps-4 w-50">
                <div class="product-content-right-product-name">
                    <h1 class="fw-bold fs-6"><?php echo $result_details['productName'] ?></h1>
                    <p class="text-secondary fw-light">MS:<?php echo $result_details['productId'] ?></p>
                </div>
                <div class="product-content-right-product-price mt-2">
                    <p class="fs-5 fw-bold"><?php echo $result_details['price'] ?><sup>đ</sup></p>
                </div>
                <div class="product-content-right-product-color mt-2">
                    <!-- <p>
                                <span class="fw-bold">Màu sắc:</span>Họa tiết đen trắng
                                <span class="p-red">*</span>
                            </p> -->
                </div>

                <!-- <div class="product-content-right-product-size">
                    <p class="fw-bold mt-3">Size:</p>
                    <div class="size">
                        <span>S</span>
                        <span>M</span>
                        <span>L</span>
                        <span>XXL</span>
                        <span>XXXL</span>
                    </div>
                </div> -->
                <div class="product-content-right-product-quantity d-inline-flex mt-2">
                    <p class="fw-bold pe-3">Số lượng:</p>
                    <input class="w-20" type="number" min="1" value="1" />
                </div>
                <div class="product-content-right-product-button">
                    <button class="d-inline-flex justify-content-evenly bg-light align-items-center">
                        <i class="fa fa-shopping-cart align-self-center "></i>
                        <p class="align-self-center">MUA HÀNG</p>
                    </button>
                    <button class="align-self-center">
                        <p class="align-self-center">TÌM TẠI CỬA HÀNG</p>
                    </button>
                </div>
                <div class="product-content-right-product-icon d-inline-flex w-30 mt-3 mb-3 justify-content-between">
                    <div class="product-content-right-product-icon-item d-inline-flex">
                        <a class="d-flex text-decoration-none text-black" href=""><i class="fa fa-phone pe-2 pt-1"></i>
                            <p class="pe-2">Hotline</p>
                        </a>
                    </div>
                    <div class="product-content-right-product-icon-item ms-3 d-inline-flex">
                        <i class="fa fa-comments pe-2"></i>
                        <p class="pe-2">Chat</p>
                    </div>
                    <div class="product-content-right-product-icon-item ms-3 d-inline-flex">
                        <i class="fa fa-envelope pe-2"></i>
                        <p class="pe-2">Mail</p>
                    </div>
                </div>
                <div class="product-content-right-product-QR">
                    <img src="qrcodeSP1.png" alt="QR code" />
                </div>
                <div class="product-content-right-bottom pt-5 w-100">
                    <div class="product-content-right-bottom-content-big ">
                        <div
                            class="product-content-right-bottom-content d-flex justify-content-center pt-5 d-inline-flex w-100">
                            <div class="product-content-right-bottom-title gioithieu">
                                <p>GIỚI THIỆU</p>
                            </div>
                        </div>
                        <div class="product-content-right-bottom-content-details pt-3">
                            <p><?php echo $result_details['description'] ?></p>
                            <!-- <div class="product-content-right-bottom-top d-inline-flex justify-content-center">
                                <i class="fa fa-caret-down"></i>
                            </div> -->


                            <!-- Thêm nội dung cần ẩn -->
                            <!-- <div class="read-more" style="display: none">

                                    </div>

                                    <div class="product-content-right-bottom-content-details2">

                                    </div>
                                    <div class="product-content-right-bottom-content-details3">

                                    </div> -->
                        </div>
                    </div>
                    <?php  }
            } ?>
                </div>
            </div>
        </div>
</section>
<section class="product-show-new pb-5">
    <div class="product-show-title d-flex justify-content-center">
        <h3 class="fw-bold">NEW ARRIVAL</h3>
    </div>
    <div class="product-show-pd  w-100">
        <div class="product-show-pd-item w-100 justify-content-center d-flex">
            <?php
            $product_new = $product->get_product_new();
            if ($product_new) {
                while ($result = $product_new->fetch_assoc()) {
            ?>

            <div class="product-show-pd-item-1  w-20 position-relative">
                <span class="product-badge new">New</span>
                <a href="product.php?productId=<?php echo $result['productId'] ?>"><img
                        class="position-relative d-inline-block"
                        src="../admin/uploads/image_product/<?php echo $result['image'] ?>" height="auto" width="85%"
                        alt="sp1" /></a>
                <a href="product.php?productId=<?php echo $result['productId'] ?>">
                    <p class="fs-15 pe-4 pt-3"><?php echo $result['productName'] ?></p>
                </a>
                <div class="d-flex justify-content-between add-to-cart pe-4">
                    <p class="fs-10 pe-4"><?php echo $result['price'] ?><sup>đ</sup></p>
                    <div class="fa fa-shopping-cart"></div>
                </div>
            </div>


            <?php }
            }
            ?>
        </div>
    </div>
    <div class="w-100 d-flex justify-content-center pt-3">
        <a class="text-decoration-none" href="">
            <div class="product-show-new-btn-show-all">Xem tất cả</div>
        </a>
    </div>
    </div>
</section>
<div class="line"></div>

<!-------------------- Footer ----------------------------------->
<?php include "inc/footer.php" ?>
<script src="js/product.js"></script>