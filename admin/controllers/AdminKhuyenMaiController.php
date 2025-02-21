<?php 
class AdminKhuyenMaiController
{
    public $modelKhuyenMai;
    public function __construct()
    {
        $this->modelKhuyenMai = new AdminKhuyenMai();
    }

    //Hiển thị Danh sach Khuyến Mãi
    public function danhSachKhuyenMai()
    {
        $listKhuyenMai = $this->modelKhuyenMai->getAllKhuyenMai();
        require_once './views/khuyenmai/listKhuyenMai.php';
    }

    //Form thêm khuyến mãi
    public function formAddKhuyenMai()
    {
        require_once './views/khuyenmai/addKhuyenMai.php';
    }
    //Thêm khuyến mãi
    public function postAddKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta']; $trang_thai = $_POST['trang_thai'];

            $this->modelKhuyenMai->insertKhuyenMai($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta,$trang_thai);
            header('Location: ' . BASE_URL_ADMIN . '?act=khuyen-mai');
            exit();
        }
    }

    //form sửa khuyến mãi
    public function formEditKhuyenMai()
    {
        $id = $_GET['id_khuyen_mai'];
        $khuyenMai = $this->modelKhuyenMai->getDetailKhuyenMai($id);
        if ($khuyenMai) {
            require_once './views/khuyenmai/editKhuyenMai.php';
        } else {
            header('Location: ' . BASE_URL_ADMIN . '?act=khuyen-mai');
            exit();
        }
    }

    //Sửa khuyến mãi
    public function postEditKhuyenMai()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];$trang_thai = $_POST['trang_thai'];

            $this->modelKhuyenMai->updateKhuyenMai($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta,$trang_thai);
            header('Location: ' . BASE_URL_ADMIN . '?act=khuyen-mai');
            exit();
        }
    }

    //Xóa khuyến mãi
    public function deleteKhuyenMai()
    {
        $id = $_GET['id_khuyen_mai'];
        $this->modelKhuyenMai->deleteKhuyenMai($id);
        header('Location: ' . BASE_URL_ADMIN . '?act=khuyen-mai');
        exit();
    }
}