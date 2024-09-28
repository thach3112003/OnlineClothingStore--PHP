<?php include('../../classes/addCategory.php'); ?>
<?php

$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];

    // Kiểm tra nếu nút thêm sản phẩm được nhấn
    if (isset($_POST['submit'])) {
        $insertCat = $cat->insert_category($catName);
    }

    // Kiểm tra nếu nút cập nhật được nhấn
    if (isset($_POST['submit_update'])) {
        $id = $_POST['catId']; // Lấy ID từ input ẩn của form
        $updateCat = $cat->update_category($catName, $id);
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

    <?php include 'header.php'; ?>
    <div class="d-inline-flex w-100">
        <div style="width: 200px;">
            <?php include 'menu-slider.php'; ?>
        </div>
        <div class="w-100">
            <main class="w-100 pe-5 pt-5 mt-5 ps-5">
                <div class="content mt-5">
                    <div class="dashboard-header d-inline-flex">
                        <input class="" type="text" placeholder="Search" name="searchcategoryinput" id="searchcategoryinput" />
                        <select class="btn btn--hover me-5" name="searchcategoryvalue" id="searchcategoryvalue">
                            <option value="id">Id</option>
                            <option value="name">Name</option>
                        </select>
                        <button class="btn btn-outline-success d-flex justify-content-center align-content-center" data-bs-toggle="modal" data-bs-target="#productModal">
                            <p class="mb-0">Thêm sản phẩm |</p>
                            <i class="mb-0 mt-1 ms-1 fa-solid fa-plus"></i>
                        </button>
                        <?php
                        if (isset($insertCat)) {
                            echo $insertCat;
                        }
                        ?>
                    </div>

                    <!-- Modal Thêm sản phẩm -->
                    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel">Thêm Loại Sản Phẩm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="category.php" method="POST">
                                        <div class="mb-3">
                                            <label for="productName" class="form-label">Tên loại sản phẩm</label>
                                            <input type="text" class="form-control" id="productName" name="catName" placeholder="Nhập tên sản phẩm" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-outline btn-success justify-content-center">Lưu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Danh sách danh mục -->
                    <div class="dashboard-body">
                        <table class="table pt-3 mt-4 w-100 table-warning table-striped">
                            <thead>
                                <tr>
                                    <th class="w-10">ID category</th>
                                    <th>Name category</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $show_cat = $cat->show_category();
                                if ($show_cat) {
                                    while ($result = $show_cat->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $result['catId']; ?></td>
                                            <td><?php echo $result['catName']; ?></td>
                                            <td class="d-ini">
                                                <!-- Nút chỉnh sửa trong hàng của bảng -->
                                                <i class="fa-regular fa-pen-to-square me-1" data-bs-toggle="modal" data-bs-target="#editproductModal" onclick="setEditData('<?php echo $result['catId']; ?>', '<?php echo $result['catName']; ?>')"></i>
                                                || <i class="ms-1 fa-regular fa-trash-can"></i>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal sửa danh mục -->
                <div class="modal fade" id="editproductModal" tabindex="-1" aria-labelledby="editproductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editproductModalLabel">Sửa Loại Sản Phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="category.php" method="POST">
                                    <input type="hidden" id="editCatId" name="catId">
                                    <div class="mb-3">
                                        <label for="editCatName" class="form-label">Tên loại sản phẩm</label>
                                        <input type="text" class="form-control" id="editCatName" name="catName" required>
                                    </div>
                                    <button type="submit" name="submit_update" class="btn btn-outline btn-success">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
        <script>
            function setEditData(catId, catName) {
                document.getElementById('editCatId').value = catId;
                document.getElementById('editCatName').value = catName;
            }
        </script>
        <script src="../jsAdmin/index.js"></script>
</body>

</html>