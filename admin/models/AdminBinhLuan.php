<?php
 class AdminBinhLuan{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getBinhLuanBySanPhamId($sanPhamId){
        $sql = 'SELECT * FROM binh_luans WhERE san_pham_id = :sanPhamId AND trang_thai = 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':sanPhamId'=>$sanPhamId]);
        $binhLuanList = $stmt->fetchAll();
        return $binhLuanList;
    }
    public function getAllBinhLuan(){
        $sql = 'SELECT * FROM binh_luans ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function updateStatus($id, $status){
        $sql = 'UPDATE binh_luans SET trang_thai = :status WHERE id=:id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id, ':status'=>$status]);
    }
    public function getVisibleBinhLuan(){
        $sql = 'SELECT * FROM binh_luans WHERE trang_thai = 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
 }
?>