<?php include('../../classes/addCategory.php'); ?>
<?php include('../../classes/addProduct.php'); ?>
<?php
$pd = new product();
$editProductData = null;

// Kiểm tra nếu có productId trong URL
if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];
    $editProductData = $pd->getproductbyId($editId);
}
?>

<?php
// Thêm sp
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['productName'];
    // Kiểm tra nếu nút thêm sản phẩm được nhấn
    if (isset($_POST['submit'])) {
        $insertProduct = $pd->insert_product($_POST, $_FILES);
        header("Location: product.php");
        exit(); // Đảm bảo script dừng lại ở đây
    }

    if (isset($_POST['submit_update']) && isset($_POST['productId'])) {
        $id = $_POST['productId'];
        $updatePd = $pd->update_product($_POST, $_FILES, $id);
        header("Location: product.php");
        exit(); // Đảm bảo script dừng lại ở đây
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin page using HTML CSS & JS</title>
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet" />
</head>

<body>

    <?php include '../inc/header.php'; ?>
    <div class="d-inline-flex w-100">
        <div style="width: 200px;">
            <?php include '../inc/menu-slider.php'; ?>
        </div>
        <div class="w-100">
            <main class="w-100 pe-5 pt-5 mt-5 ps-5">
                <div class="content mt-5">
                    <div class="dashboard-header d-inline-flex">
                        <input class="" type="text" placeholder="Search" name="searchcategoryinput"
                            id="searchcategoryinput" />
                        <select class="btn btn--hover me-5" name="searchcategoryvalue" id="searchcategoryvalue">
                            <option value="id">Id</option>
                            <option value="name">Name</option>
                        </select>
                        <button class="btn btn-outline-success d-flex justify-content-center align-content-center"
                            data-bs-toggle="modal" data-bs-target="#productModal">
                            <p class="mb-0">Thêm sản phẩm |</p>
                            <i class="mb-0 mt-1 ms-1 fa-solid fa-plus"></i>
                        </button>
                    </div>

                    <!-- Modal Thêm sản phẩm -->
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel">Thêm Sản Phẩm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="product.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="productName" name="productName"
                                                placeholder="Nhập tên sản phẩm" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Loại sản phẩm</label>
                                            <select name="category" id="seclect" class="ms-5">
                                                <option>--Chọn danh mục--</option>
                                                <?php
                                                $cat = new category();
                                                $catlist = $cat->show_category();
                                                if ($catlist) {
                                                    while ($result = $catlist->fetch_assoc()) {
                                                ?>
                                                <option value=<?php echo $result['catId'] ?>>
                                                    <?php echo $result['catName'] ?></option>
                                                <?php }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productPrice" class="form-label">Giá sản phẩm</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="Nhập giá sản phẩm" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productDescription" class="form-label">Mô tả</label>
                                            <textarea class="tinymce" name="description" id="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="productQuantity" class="form-label">Số lượng</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity"
                                                placeholder="Nhập số lượng sản phẩm" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <button type="submit" name="submit"
                                            class="btn btn-outline btn-success justify-content-center">Lưu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Danh sách sản phẩm -->
                    <div class="dashboard-body">

                        <table class="table pt-3 mt-4 w-100 table-warning table-striped">
                            <thead>
                                <tr>
                                    <th class="w-10">ID SP</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $show_pd = $pd->show_product();
                                if ($show_pd) {
                                    while ($result = $show_pd->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $result['productId'] ?></td>
                                    <td><?php echo $result['productName'] ?></td>
                                    <td><?php echo $result['catName'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><?php echo $result['description'] ?></td>
                                    <td><img src="../uploads/image_product/<?php echo trim($result['image']) ?>"
                                            width="80"></td>
                                    <td>
                                        <!-- Nút chỉnh sửa trong hàng của bảng -->
                                        <i class="fa-regular fa-pen-to-square me-1"
                                            onclick="window.location.href='product.php?edit_id=<?php echo $result['productId']; ?>';"></i>
                                        || <i class="ms-1 fa-regular fa-trash-can" data-bs-toggle="modal"
                                            data-bs-target="#delModal"></i>
                                    </td>
                                </tr>
                                <?php }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal sửa sản phẩm -->
                <!-- Modal sửa sản phẩm -->
                <div class="modal fade <?php echo isset($editProductData) ? 'show' : ''; ?>" id="editproductModal"
                    tabindex="-1" aria-labelledby="editproductModalLabel" aria-hidden="true"
                    style="<?php echo isset($editProductData) ? 'display: block;' : ''; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editproductModalLabel">Sửa Sản Phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if ($editProductData && $result_product = $editProductData->fetch_assoc()) { ?>
                                <form action="product.php" method="POST">
                                    <input type="hidden" name="productId"
                                        value="<?php echo $result_product['productId']; ?>">

                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="productName" name="productName"
                                            value="<?php echo $result_product['productName']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Loại sản phẩm</label>
                                        <select name="category" class="form-select">
                                            <option value="">--Chọn danh mục--</option>
                                            <?php
                                                $catlist = $cat->show_category();
                                                if ($catlist) {
                                                    while ($result = $catlist->fetch_assoc()) {
                                                ?>
                                            <option value="<?php echo $result['catId']; ?>"
                                                <?php echo ($result_product['catId'] == $result['catId'] ? 'selected' : ''); ?>>
                                                <?php echo $result['catName']; ?></option>
                                            <?php }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Giá sản phẩm</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            value="<?php echo $result_product['price']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô tả</label>
                                        <textarea class="form-control"
                                            name="description"><?php echo $result_product['description']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Số lượng</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            value="<?php echo $result_product['quantity']; ?>" required>
                                    </div>
                                    <button type="submit" name="submit_update" class="btn btn-success">Sửa</button>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal xóa sản phẩm -->
                <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delModalLabel">Xóa sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xóa sản phẩm này?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
    function setEditData(productId) {
        // Gán productId vào input hidden của modal
        document.getElementById('editProductId').value = productId;
    }

    function setDeleteData(catId) {
        document.getElementById('delCatId').value = catId;
    }
    </script>
    <script>
    // Tự động mở modal nếu có dữ liệu chỉnh sửa
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.search.includes('edit_id')) {
            var myModal = new bootstrap.Modal(document.getElementById('editproductModal'));
            myModal.show();
        }
    });
    </script>

</body>

</html>