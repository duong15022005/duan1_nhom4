<?php
class AdminBannerController{
    public $modelBanner;
    public function __construct()
    {
        $this->modelBanner = new AdminBanner();
    }
    public function danhSachBanner(){
        $listBanner = $this->modelBanner->getAllBanners();
        require_once './views/banner/listBanner.php';
    }
    public function fromAddBanner(){
        require_once './views/banner/addBanner.php';
    }
    public function postAddBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $ten_banner = $_POST['ten_banner'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Xử lý upload file hình ảnh
            $file_thumb = '';
            if ($hinh_anh && $hinh_anh['error'] === 0) {
                $file_thumb = uploadFile($hinh_anh, './uploads/');
            }

            // Xác thực dữ liệu
            $error = [];
            if (empty($ten_banner)) {
                $error['ten_banner'] = 'Tên Banner không được bỏ trống!';
            }
            if (empty($mo_ta)) {
                $error['mo_ta'] = 'Mô tả không được bỏ trống!';
            }
            if (empty($file_thumb)) {
                $error['hinh_anh'] = 'Vui lòng chọn ảnh!';
            }

            // Lưu lỗi vào session và điều hướng nếu có lỗi
            if (!empty($error)) {
                $_SESSION['error'] = $error;
                header('Location:' . BASE_URL_ADMIN . '?act=form-them-banner');
                exit();
            }

            // Thêm banner vào cơ sở dữ liệu nếu không có lỗi
            $banner_id = $this->modelBanner->insertBanner($ten_banner, $mo_ta, $file_thumb);
            if ($banner_id) {
                header('Location:' . BASE_URL_ADMIN . '?act=banner');
                exit();
            }
        }
    }
    public function fromEditBanner()
    {
        $id = $_GET['id_banner'];
        $banner = $this->modelBanner->getDetailBanner($id);
        if ($banner) {
            require_once('./views/banner/editBanner.php');
            deleteSessionError(); // Clear error session if exists
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=banner');
            exit();
        }
    }
    public function postEditBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $banner_id = $_POST['id'] ?? '';
            $bannerOld = $this->modelBanner->getDetailBanner($banner_id);
            $old_file = $bannerOld['hinh_anh'];
            $ten_banner = $_POST['ten_banner'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'] ?? null;
            $error = [];

            // Validate form inputs
            if (empty($ten_banner)) {
                $error['ten_banner'] = 'Tên Banner Không Được Bỏ Trống!';
            }

            $_SESSION['error'] = $error;

            // Process image upload if a new image is uploaded
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) {
                    deleteFile($old_file); // Delete old file
                }
            } else {
                $new_file = $old_file;
            }

            if (empty($error)) {
                $this->modelBanner->updateBanner($banner_id, $ten_banner, $mo_ta, $new_file);
                header('Location: ' . BASE_URL_ADMIN . '?act=banner');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-banner&id_banner=' . $banner_id);
                exit();
            }
        }
    }
    public function deleteBanner()
    {
        $id = $_GET['id_banner'];
        $banner = $this->modelBanner->getDetailBanner($id);
        if ($banner) {
            deleteFile($banner['hinh_anh']);
            $this->modelBanner->destroyBanner(id: $id);
        }
        header('Location:' . BASE_URL_ADMIN . '?act=banner');
        exit();
    }
}

?>