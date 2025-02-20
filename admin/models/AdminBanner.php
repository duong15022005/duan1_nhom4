<?php
 class AdminBanner {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBanners(){
        $sql = "SELECT * FROM banners";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertBanner($ten_banner, $mo_ta, $hinh_anh){
        $sql = "INSERT INTO banners (ten_banner, mo_ta, hinh_anh) VALUES (:ten_banner, :mo_ta, :hinh_anh)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':ten_banner' => $ten_banner, ':mo_ta' => $mo_ta, ':hinh_anh' => $hinh_anh]);
        return $this->conn->lastInsertId();
    }
    public function getDetailBanner($id){
        $sql = "SELECT * FROM banners WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateBanner($id, $ten_banner, $mo_ta, $hinh_anh){
        $sql = "UPDATE banners SET ten_banner = :ten_banner, mo_ta = :mo_ta, hinh_anh = :hinh_anh WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id, ':ten_banner' => $ten_banner, ':mo_ta' => $mo_ta, ':hinh_anh' => $hinh_anh]);
        return true;
    }
    public function destroyBanner($id){
        $sql = "DELETE FROM banners WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;
    }
 }


?>