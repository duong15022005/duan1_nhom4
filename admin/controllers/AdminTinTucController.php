<?php 
class AdminTinTucController
{
    public $modelTinTuc;

    public function __construct()
    {
        $this->modelTinTuc = new AdminTinTuc();
    }

    public function danhSachTinTuc()
    {
        $listTinTuc = $this->modelTinTuc->getAllTinTuc();

        require './views/tintuc/listTinTuc.php';
    
    }

    public function fromAddTinTuc()
    {
        require './views/tintuc/addTinTuc.php';
    }

    public function postAddTinTuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $thong_tin = $_POST['thong_tin'] ?? '';
            $error = [];
    
            // Image upload logic
            $hinh_anh = $_FILES['hinh_anh']  ?? '';
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
                $file_thumb = uploadFile($hinh_anh, './uploads/');
                
            }
    
            if (empty($name)) {
                $error['name'] = 'Tên Không Được Bỏ Trống !';
            }
    
            if (empty($error)) {
                $this->modelTinTuc->insertTinTuc($name, $thong_tin, $file_thumb);
                header('Location:' . BASE_URL_ADMIN . '?act=tin-tuc');
                exit();
            } else {
                require_once('./views/tintuc/addTinTuc.php');
            }
        }
    }

    public function fromEditTinTuc()
    {
        $id = $_GET['id_tin_tuc'] ?? null;
        $tinTuc = $this->modelTinTuc->getDetailTinTuc($id);

        if ($tinTuc) {
            require_once('./views/tintuc/editTinTuc.php');
        } else {
            header('Location:' . BASE_URL_ADMIN . '?act=tin-tuc');
            exit();
        }
    }
    public function postEditTinTuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $thong_tin = $_POST['thong_tin'] ?? '';
            $error = [];
    
            // Lấy tên ảnh cũ
            $hinh_anh = $_POST['hinh_anh_old'] ?? ''; 
    
            // Kiểm tra và xử lý ảnh mới
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === UPLOAD_ERR_OK) {
                try {
                    // Gọi hàm uploadFile để xử lý ảnh mới
                    $hinh_anh = uploadFile($_FILES['hinh_anh'], './uploads/');
                } catch (Exception $e) {
                    $error['hinh_anh'] = 'Lỗi tải ảnh: ' . $e->getMessage();
                }
            }
    
            // Kiểm tra tên
            if (empty($name)) {
                $error['name'] = 'Tên không được bỏ trống!';
            }
    
            // Nếu không có lỗi, cập nhật dữ liệu
            if (empty($error)) {
                $this->modelTinTuc->updateTinTuc($id, $name, $thong_tin, $hinh_anh);
                header('Location:' . BASE_URL_ADMIN . '?act=tin-tuc');
                exit();
            } else {
                // Nếu có lỗi, load lại view sửa tin tức với dữ liệu cũ
                $tinTuc = [
                    'id' => $id,
                    'name' => $name,
                    'thong_tin' => $thong_tin,
                    'hinh_anh' => $hinh_anh,
                ];
                require_once('./views/tintuc/editTinTuc.php');
            }
        }
    }
    public function deleteTinTuc()
    {
        $id = $_GET['id_tin_tuc'] ?? null;
        $tinTuc = $this->modelTinTuc->getDetailTinTuc($id);

        if ($tinTuc) {
            $this->modelTinTuc->destroyTinTuc($id);
        }

        header('Location:' . BASE_URL_ADMIN . '?act=tin-tuc');
        exit();
    }

}
?>