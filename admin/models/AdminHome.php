<?php
class AdminHome
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function getTotalProducts()
    {
        $query = "SELECT COUNT(*) AS total FROM san_phams";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalCompletedOrders()
    {
        $query = "SELECT COUNT(*) AS total FROM don_hangs WHERE trang_thai_id = 5";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalUsers()
    {
        $query = "SELECT COUNT(*) AS total FROM tai_khoans";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalRevenue()
    {
        $query = "SELECT SUM(tong_tien) AS total_revenue FROM don_hangs WHERE trang_thai_id = 5";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_revenue'] ?? 0;
    } 

    // Lấy dữ liệu thống kê doanh thu theo ngày
    public function getDailyRevenue()
    {
        $query = "SELECT DATE(ngay_dat) AS order_date, 
                         COUNT(*) AS total_orders, 
                         SUM(tong_tien) AS total_revenue
                  FROM don_hangs
                  WHERE trang_thai_id = 5
                  GROUP BY DATE(ngay_dat)
                  ORDER BY DATE(ngay_dat) DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
