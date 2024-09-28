<?php

include '../../lib/database.php';
include '../../helpers/format.php';
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
}
