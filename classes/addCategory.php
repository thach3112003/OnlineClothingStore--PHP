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
            $alert = "<div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>Thông báo</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                        Sản phẩm chưa đủ thông tin cần thiết!
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Đóng</button>
                         </div>
                        </div>
                        </div>
                    </div>
                    <script>
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    </script>";
            "";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = " <div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>Thông báo</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                        Thêm sản phẩm thành công!
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-success' data-bs-dismiss='modal'>Đóng</button>
                         </div>
                        </div>
                        </div>
                    </div>
                    <script>
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    </script>";
                return $alert;
            } else {
                $alert = "<div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                            <h5 class='modal-title' id='successModalLabel'>Thông báo</h5>
                             <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            Thêm sản phẩm thành công!
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Đóng</button>
                         </div>
                        </div>
                        </div>
                    </div>
                    <script>
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    </script>";
                return $alert;
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
            $alert = "<div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>Thông báo</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                        Sản phẩm chưa đủ thông tin cần thiết!
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Đóng</button>
                         </div>
                        </div>
                        </div>
                    </div>
                    <script>
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    </script>";
            "";
            return $alert;
        } else {
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = " <div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                        <h5 class='modal-title' id='successModalLabel'>Thông báo</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                        Update sản phẩm thành công!
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-success' data-bs-dismiss='modal'>Đóng</button>
                         </div>
                        </div>
                        </div>
                    </div>
                    <script>
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    </script>";
                return $alert;
            } else {
                $alert = "<div class='modal fade show' id='successModal' tabindex='-1' aria-labelledby='successModalLabel' style='display: block;' aria-modal='true' role='dialog'>
                            <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                            <h5 class='modal-title' id='successModalLabel'>Thông báo</h5>
                             <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                            Update sản phẩm thất bại!
                            </div>
                            <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Đóng</button>
                         </div>
                        </div>
                        </div>
                    </div>
                    <script>
                        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                        successModal.show();
                    </script>";
                return $alert;
            }
        }
    }
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM tbl_category where catId ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
