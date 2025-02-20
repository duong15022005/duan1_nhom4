<?php
class AdminBinhLuanController {
    public $modelBinhLuan;
    public function __construct(){
        $this->modelBinhLuan = new AdminBinhLuan();

    }
    public function danhSachBinhLuan(){
        $ListBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once('./views/binhluan/ListBinhLuan.php');
    }
    public function hienThiBinhLuanTheoSanPham($sanPhamId){
       return $this->modelBinhLuan->getBinhLuanBySanPhamId($sanPhamId);
    }
    public function hideBinhLuan($id){
        $this->modelBinhLuan->updateStatus($id, 0);
        header ("location: ./?act=binh-luan");
    }
    public function showBinhLuan($id){
        $this->modelBinhLuan->updateStatus($id, 1);
        header ("location: ./?act=binh-luan");
    }
}

?>