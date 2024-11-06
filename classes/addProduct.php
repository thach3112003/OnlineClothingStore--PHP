<?php

include_once '../../lib/database.php';
include_once '../../helpers/format.php';
?>

<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);

        // Thêm hình ảnh (file)
        //kiểm tra và lấy hình ảnh cho vào folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);

        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . ('.') . $file_ext;
        $uploaded_image = '../uploads/image_product/'   . $unique_image;

        if ($productName == "" || $category == "" || $price == "" || $quantity == "" || $description == "" || $file_name == "") {
            return $this->showModal('Thông báo', 'Thêm thất bại, không đủ dữ liệu!', 'danger');
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,catId,price,quantity,description,image) VALUES('$productName','$category','$price','$quantity','$description','$unique_image')";
            $results = $this->db->insert($query);
            if ($results) {
                return $this->showModal('Thông báo', 'Thêm sản phẩm thành công', 'success');
            } else {
                return $this->showModal('Thông báo', 'Thêm sản phẩm thất bại', 'danger');
            };
        }
    }
    //Show product
    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId order by tbl_product.productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    // Edit 
    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']);

        // Thêm hình ảnh (file)
        // kiểm tra và lấy hình ảnh cho vào folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $files['image']['name'];
        $file_size = $files['image']['size'];
        $file_temp = $files['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = '../uploads/image_product/' . $unique_image;

        if ($productName == "" || $category == "" || $price == "" || $quantity == "" || $description == "") {
            return $this->showModal('Thông báo', 'Cập nhật thất bại, không đủ dữ liệu!', 'danger');
        } else {
            if (!empty($file_name)) {
                // Kiểm tra kích thước file
                if ($file_size > 2048000) {
                    return $this->showModal('Thông báo', 'Kích thước ảnh phải nhỏ hơn 2MB!', 'danger');
                } elseif (!in_array($file_ext, $permited)) {
                    return $this->showModal('Thông báo', 'Bạn chỉ có thể tải lên các loại ảnh: ' . implode(', ', $permited), 'danger');
                }

                // Di chuyển file ảnh và cập nhật câu truy vấn với ảnh
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product SET
                productName = '$productName',
                catId = '$category',
                price = '$price',
                quantity = '$quantity',
                description = '$description',
                image = '$unique_image'
                WHERE productId = '$id'";
            } else {
                // Nếu không có ảnh mới
                $query = "UPDATE tbl_product SET
                productName = '$productName',
                catId = '$category',
                price = '$price',
                quantity = '$quantity',
                description = '$description'
                WHERE productId = '$id'";
            }
        }

        $result = $this->db->update($query);
        if ($result) {
            return $this->showModal('Thông báo', 'Cập nhật sản phẩm thành công!', 'success');
        } else {
            return $this->showModal('Thông báo', 'Cập nhật sản phẩm thất bại!', 'danger');
        }
    }

    //Get product by ID
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product where productId ='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    // show sản phẩm
    public function showModal($title, $message, $type)
    {
        return "
        <div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
            <div class='modal-dialog modal-dialog-centered'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>$title</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        $message
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-$type' data-bs-dismiss='modal'>Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        </script>
    ";
    }
}