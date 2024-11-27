<?php
include 'inc/header.php';
?>
<header>
    <title>Trang chủ</title>
</header>

<!-- Product show section -->

<section id="slider" class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img href="#" src="../image/slider3.png" class="d-block w-100" alt="Slider Image 1" />
            </div>
            <div class="carousel-item">
                <img href="#" src="../image/slider4.webp" class="d-block w-100" alt="Slider Image 2" />
            </div>
            <div class="carousel-item">
                <img href="#" src="../image/slider5.webp" class="d-block w-100" alt="Slider Image 3" />
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div </section>
</section>
<section class="product-show-new">
    <div class="product-show-title d-flex justify-content-center pt-5">
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


<section class="product-show-best-seller">
    <div class="product-show-title d-flex justify-content-center pt-5">
        <h3 class="fw-bold">BEST SELLER OF THE SEASON</h3>
    </div>
    <div class="product-show-pd w-100">
        <div class="product-show-pd-item d-flex justify-content-center">

            <?php $product_bestSeller = $product->get_product_bestSeller();
      if ($product_bestSeller) {
        while ($result_new = $product_bestSeller->fetch_assoc()) {
      ?>
            <div class="product-show-pd-item-1 w-20 position-relative">
                <span class="product-badge best-seller fst-italic">Best seller</span>
                <img class=" position-relative d-inline-block"
                    src="../admin/uploads/image_product/<?php echo $result_new['image'] ?>" height="auto" width="85%"
                    alt="sp1" />
                <a href="">
                    <p class="fs-15 pe-4 pt-3"><?php echo $result_new['productName'] ?></p>
                </a>
                <div class="d-flex justify-content-between add-to-cart pe-4">
                    <p class="fs-10 pe-4"><?php echo $result_new['price'] ?><sup>đ</sup></p>
                    <div class="fa fa-shopping-cart"></div>
                </div>
            </div>
            <?php
        }
      } ?>


        </div>
        <div class="btn-show-all w-100 d-flex justify-content-center pt-3">
            <a class="text-decoration-none" href="">
                <div class="product-show-new-btn-show-all">Xem tất cả</div>
            </a>
        </div>
    </div>
</section>

<div class="line w-100 position-relative"></div>

<section class="middle">
    <div class="app-container">
        <p>Tải ứng dụng IVY MODA</p>
        <div class="app-google">
            <img src="../image/appstore.png" alt="appstore" />
            <img src="../image/googleplay.png" alt="google play" />
        </div>
        <p>Nhận bản tin của IVY</p>
        <input type="text" placeholder="Nhập email của bạn..." />
    </div>










    <?php include(BASE_PATH . '/inc/footer.php') ?>