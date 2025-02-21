<?php 
class AdminKhuyenMai
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB(); //Kết nối CSDL
    }
     //lấy tất cả khuyến mãi
     public function getAllKhuyenMai()
     {
        try {
            $sql = 'SELECT * FROM khuyen_mais';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
     }

     //Thêm khuyến mãi
     public function insertKhuyenMai($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
     {
        try {
            $sql = 'INSERT INTO khuyen_mais (id, ten_khuyen_mai, ma_khuyen_mai, gia_tri, ngay_bat_dau, ngay_ket_thuc, mo_ta, trang_thai) 
                    VALUES (:id, :ten_khuyen_mai, :ma_khuyen_mai, :gia_tri, :ngay_bat_dau, :ngay_ket_thuc, :mo_ta, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => null,
                ':ten_khuyen_mai' => $ten_khuyen_mai,
                ':ma_khuyen_mai' => $ma_khuyen_mai,
                ':gia_tri' => $gia_tri,
                ':ngay_bat_dau' => $ngay_bat_dau,
                ':ngay_ket_thuc' => $ngay_ket_thuc,
                ':mo_ta' => $mo_ta,
                ':trang_thai' => $trang_thai,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
     }

     //Lấy chi tiết khuyến mãi theo ID

     public function getDetailKhuyenMai($id)
     {
        try {
            $sql = 'SELECT * FROM khuyen_mais WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
     }

     //Cập nhật Khuyến mãi
     public function updateKhuyenMai($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai) 
     {
        try {
            $sql = 'UPDATE khuyen_mais SET 
                ten_khuyen_mai = :ten_khuyen_mai, 
                ma_khuyen_mai = :ma_khuyen_mai, 
                gia_tri = :gia_tri,  
                ngay_bat_dau = :ngay_bat_dau, 
                ngay_ket_thuc = :ngay_ket_thuc,
                mo_ta = :mo_ta,
                trang_thai = :trang_thai
                WHERE id = :id';  
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,  
                    ':ten_khuyen_mai' => $ten_khuyen_mai,
                    ':ma_khuyen_mai' => $ma_khuyen_mai,
                    ':gia_tri' => $gia_tri,
                    ':ngay_bat_dau' => $ngay_bat_dau,
                    ':ngay_ket_thuc' => $ngay_ket_thuc,
                    ':mo_ta' => $mo_ta,
                    ':trang_thai' => $trang_thai
                ]);
                return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
     }
     //Xóa khuyến mãi
     public function deleteKhuyenMai($id)
     {
        try {
            $sql = 'DELETE FROM khuyen_mais WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi Truy Vấn: " . $e->getMessage();
        }
     }
}
?>