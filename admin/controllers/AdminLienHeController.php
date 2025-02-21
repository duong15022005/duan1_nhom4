<?php

class AdminLienHeController
{
    public $modelLienHe;

    public function __construct() 
    {
        $this->modelLienHe = new AdminLienHe();
    }

    public function danhSachLienHe()
    {
        $lienHes = $this->modelLienHe->getAllLienHe();
        require_once './views/lienhe/listLienHe.php';
    }

    public function fromAddLienHe()
    {
        require_once './views/lienhe/addLienHe.php';
    }

    public function postAddLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_lien_he = $_POST['ten_lien_he'];
            $email = $_POST['email'];
            $thong_tin = $_POST['thong_tin'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];

            if (empty($ten_lien_he)) {
                $errors['ten_lien_he'] = 'Tên liên hệ không được để trống';
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($thong_tin)) {
                $errors['thong_tin'] = 'Thông tin không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelLienHe->postData($ten_lien_he, $email, $thong_tin, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-them-lien-he');
                exit();
            }
        }
    }

    public function fromEditLienHe()
    {
        $id = $_GET['lien_he_id'];
        $lienHe = $this->modelLienHe->getDetailData($id);

        if (!$lienHe) {
            $lienHe = ['ten_lien_he' => '', 'email' => '', 'thong_tin' => '', 'trang_thai' => ''];
        }

        require_once './views/lienhe/editLienHe.php';
    }

    public function postEditLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_lien_he = $_POST['ten_lien_he'];
            $email = $_POST['email'];
            $thong_tin = $_POST['thong_tin'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];

            if (empty($ten_lien_he)) {
                $errors['ten_lien_he'] = 'Tên liên hệ không được để trống';
            }
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($thong_tin)) {
                $errors['thong_tin'] = 'Thông tin không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelLienHe->updateData($id, $ten_lien_he, $email, $thong_tin, $trang_thai);
                header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-lien-he&id=' . $id);
                exit();
            }
        }
    }

    public function destroyLienHe()
    {
        $id = $_GET['lien_he_id'];
        if (isset($id) && is_numeric($id)) {
            $this->modelLienHe->destroyLienHe($id);
        } else {
            echo 'ID không hợp lệ';
        }
        header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }
    


    public function changeTrangThaiLienHe()
    {
        $id = $_GET['lien_he_id'];
        $trang_thai_id = $_GET['trang_thai_id'];
        $this->modelLienHe->updateTrangThai($id, $trang_thai_id);
        header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }
}



?>