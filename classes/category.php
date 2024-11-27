<?php
$filepath = realpath(dirname(__FILE__));
if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__ . '/..');
}
include(BASE_PATH . '/config/config.php');
include_once(BASE_PATH . '/lib/database.php');
include_once(BASE_PATH . '/helpers/format.php');
?>

<?php
class category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName); //

        if (empty($catName)) {
            return $this->showModal('Thông báo', 'Không để trống tên loại!', 'danger');
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
            $result = $this->db->insert($query);
            if ($result) {
                return $this->showModal('Thông báo', 'Thêm thành công!', 'success');
            } else {
                return $this->showModal('Thông báo', 'Thêm thất bại!', 'danger');
            }
        }
    }
    // show sản phẩm
    public function show_category()
    {
        $query = "SELECT * FROM tbl_category order by catId desc";
        $result = $this->db->select($query);
        return $result;
    }
    // Edit 
    public function update_category($catName, $id)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName); //

        if (empty($catName)) {
            return $this->showModal('Thông báo', 'Không để trống tên loại!', 'danger');
        } else {
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                return $this->showModal('Thông báo', 'Update thành công!', 'success');
            } else {
                return $this->showModal('Thông báo', 'Update thất bại!', 'danger');
            }
        }
    }
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM tbl_category where catId ='$id'";
        $result = $this->db->select($query);
        return $result;
    }

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
    public function delete_category($id)
    {
        $query = "DELETE FROM tbl_category WHERE catId = '$id'";
        $result = $this->db->delete($query);

        if ($result) {
            return $this->showModal('Thông báo', 'Xóa thành công!', 'success');
        } else {
            return $this->showModal('Thông báo', 'Xóa thất bại!', 'danger');
        }
    }
    public function get_category()
    {

        $query = "SELECT tbl_category.catName
            FROM tbl_product
            JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            WHERE tbl_product.productId = 'productId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_category_from_id($catID)
    {
        $query = "SELECT catName FROM tbl_category where catId = '$catID'";
        $result = $this->db->select($query);
        return $result;
    }
}
