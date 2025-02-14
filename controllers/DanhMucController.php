<?php
class AdminDanhMucController {
    public $modelDanhMuc;
    public function __construct() {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhmuc.php';
    }
    //fom them dm
    public function formAddDanhMuc(){
        require_once './views/danhmuc/addDanhmuc.php';
    }
    public function postAddDanhMuc(){
        //kiem tra du lieu xem co phai duoc them khong
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lay ra du lieu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            //tao mang chua dl
            $error = [];
            if (empty($ten_danh_muc)) {
                $error['ten_danh_muc'] = "Tên danh mục không được để trống";
            }
            //neu ko loi thi them dm
            if (empty($error)) {
             
                   $this -> modelDanhMuc -> insertDanhMuc($ten_danh_muc, $mo_ta);
                   header ('location' . BASE_URL_ADMIN . '?act=danh-muc');
                   exit();
            }else {
                require_once './views/danhmuc/addDanhmuc.php';

            } //neu co loi tra ve form
                

         
        }
    }
    //sua dm
    public function formEditDanhMuc(){
        //thong tin dm can sua
        $id = $_GET['id_danh_muc'];
        // $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        require_once './views/danhmuc/editDanhmuc.php';
    }
}
?>