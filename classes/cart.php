<?php
$filepath = realpath(dirname(__FILE__));
include_once(BASE_PATH . '/lib/database.php');
include_once(BASE_PATH . '/helpers/format.php');
?>

<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
}
?>