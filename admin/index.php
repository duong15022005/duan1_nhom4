<?php 
session_start();

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers

// require_once 'controllers/DashboardController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminDonHangController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminHomeController.php';
require_once './controllers/AdminBinhLuanController.php';
require_once './controllers/AdminBannerController.php';
require_once './controllers/AdminKhuyenMaiController.php';
require_once './controllers/AdminTinTucController.php';
require_once './controllers/AdminLienHeController.php';

// Require toàn bộ file Models
require_once './models/AdminHome.php';
require_once './models/AdminHome.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminBinhLuan.php';
require_once './models/AdminBanner.php';
require_once './models/AdminKhuyenMai.php';
require_once './models/AdminTinTuc.php';
require_once './models/AdminLienHe.php';

// require_once 'controllers/DashboardController.php';

// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    
    '/'                 => (new AdminHomeController())->home(),
    // Rout auth
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->Login(),
    'logout-admin' => (new AdminTaiKhoanController())->Logout(),
    // Rout Danh Mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),// Hiển Thị 
    'from-them-danh-muc' => (new AdminDanhMucController())->fromAddDanhMuc(),// Thêm 
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'from-edit-danh-muc' => (new AdminDanhMucController())->fromEditDanhMuc(),// Sửa
    'edit-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'delete-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(), //Xóa

    // Rout Sản Phẩm
    'san-pham' => (new AdminSanPhamController())->danhSachSanPham(),// Hiển Thị 
    'from-them-san-pham' => (new AdminSanPhamController())->fromAddSanPham(),// Thêm 
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'from-edit-san-pham' => (new AdminSanPhamController())->fromEditSanPham(),// Sửa
    'edit-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'edit-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
    'delete-san-pham' => (new AdminSanPhamController())->deleteSanPham(), //Xóa
    'chi-tiet-san-pham' => (new AdminSanPhamController())->detailSanPham(),// Chi Tiết Sản Phẩm

    // Rout Tài Khoản
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),// Hiển Thị
    'from-them-quan-tri' => (new AdminTaiKhoanController())->fromAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
    'from-edit-quan-tri' => (new AdminTaiKhoanController())->fromEditQuanTri(),
    'edit-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),

    // Rout Khách Hàng
    // Rout dùng chung cho các tài khoản
    'reset-password' => (new AdminTaiKhoanController())->resetPassword(),
    // Rout Quản Lý Tài Khoản Khách Hàng
    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'from-edit-khach-hang' => (new AdminTaiKhoanController())->fromEditKhachHang(),
    'edit-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->deltailKhachHang(),
    // rout Banner 
    'banner' => (new AdminBannerController())->danhSachBanner(),
    'form-them-banner' => (new AdminBannerController())->fromAddBanner(),
    'them-banner' => (new AdminBannerController())->postAddBanner(),
    'form-sua-banner' => (new AdminBannerController())->fromEditBanner(),
    'sua-banner' => (new AdminBannerController())->postEditBanner(),
    'xoa-banner' => (new AdminBannerController())->deleteBanner(),

    // Rout Đơn Hàng
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),// Hiển Thị 
    'from-edit-don-hang' => (new AdminDonHangController())->fromEditDonHang($_GET['id']),// Sửa
    'edit-don-hang' => (new AdminDonHangController())->capNhatDonHang(),
    'detail-don-hang' => (new AdminDonHangController())->detailDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->showDetail($_GET['id']),
    'xoa-don-hang' => (new AdminDonHangController())->deleteDonHang($_GET['id']), //Xóa
    'cap-nhat-trang-thai-don-hang' => (new AdminDonHangController())->capNhatTrangThaiDonHang(),
    // bình luận
    'binh-luan' => (new AdminBinhLuanController())->danhSachBinhLuan(),
    'hide-binh-luan' =>isset($_GET['id']) ? (new AdminBinhLuanController())->hideBinhLuan($_GET['id']) : null,
    'show-binh-luan' =>isset($_GET['id']) ? (new AdminBinhLuanController())->showBinhLuan($_GET['id']) : null,

    // Route cho Quản Lý Khuyến Mãi
    'khuyen-mai' => (new AdminKhuyenMaiController())->danhSachKhuyenMai(),
    'from-them-khuyen-mai' => (new AdminKhuyenMaiController())->formAddKhuyenMai(),
    'them-khuyen-mai' => (new AdminKhuyenMaiController())->postAddKhuyenMai(),
    'from-edit-khuyen-mai' => (new AdminKhuyenMaiController())->formEditKhuyenMai(),
    'edit-khuyen-mai' => (new AdminKhuyenMaiController())->postEditKhuyenMai(),
    'delete-khuyen-mai' => (new AdminKhuyenMaiController())->deleteKhuyenMai(),
    
    // Rout Quản Lý Tin Tức
    'tin-tuc' => (new AdminTinTucController())->danhSachTinTuc(),
    'from-add-tin-tuc' => (new AdminTinTucController())->fromAddTinTuc(),
    'add-tin-tuc' => (new AdminTinTucController())->postAddTinTuc(),
    'from-edit-tin-tuc' => (new AdminTinTucController())->fromEditTinTuc(),
    'edit-tin-tuc' => (new AdminTinTucController())->postEditTinTuc(),
    'delete-tin-tuc' => (new AdminTinTucController())->deleteTinTuc(),

    // Rout Quản Lý Liên Hệ
    'lien-he' => (new AdminLienHeController())->danhSachLienHe(),
    'form-them-lien-he' => (new AdminLienHeController())->fromAddLienHe(),
    'them-lien-he' => (new AdminLienHeController())->postAddLienHe(),
    'form-sua-lien-he' => (new AdminLienHeController())->fromEditLienHe(),
    'sua-lien-he' => (new AdminLienHeController())->postEditLienHe(),
    'xoa-lien-he' => (new AdminLienHeController())->destroyLienHe(),
    'update-trang-thai-lien-he' => (new AdminLienHeController())->changeTrangThaiLienHe(),
};