<?php
 class AdminLienHe
 {
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllLienHe()
    {
        try {
            $sql = 'SELECT * FROM lien_hes ORDER BY id DESC';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
             // Log the error and provide a generic message
             file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
             echo 'Lỗi: Không thể lấy danh sách liên hệ!';
        }
    }

    public function getTrangThai()
    {
        try {
            $sql = "SELECT * FROM trang_thai_lien_he";
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log the error
            file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo 'Lỗi: Không thể lấy trạng thái liên hệ!';
        }
    }
    public function updateTrangThai($id, $trang_thai_id)
    {
        try {
            $sql = "UPDATE lien_hes SET trang_thai_id = :trang_thai_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':trang_thai_id' => $trang_thai_id, ':id' => $id]);
        } catch (PDOException $e) {
            file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo 'Lỗi: Không thể cập nhật trạng thái liên hệ!';
        }
    }

    public function postData($ten_lien_he, $email, $thong_tin, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO lien_hes (ten_lien_he, email, thong_tin, trang_thai)
                    VALUES (:ten_lien_he, :email, :thong_tin, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_lien_he', $ten_lien_he);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':thong_tin', $thong_tin);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo 'Lỗi: Không thể thêm liên hệ!';
        }
    }

    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM lien_hes WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo 'Lỗi: Không thể lấy thông tin liên hệ!';
        }
    }

    public function updateData($id, $ten_lien_he, $email, $thong_tin, $trang_thai)
    {
        try {
            $sql = 'UPDATE lien_hes SET ten_lien_he = :ten_lien_he, email = :email, thong_tin = :thong_tin, trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_lien_he', $ten_lien_he);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':thong_tin', $thong_tin);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo 'Lỗi: Không thể cập nhật dữ liệu liên hệ!';
        }
    }

    public function destroyLienHe($id)
    {
        try {
            echo "ID: " . $id; // Kiểm tra xem ID có đúng không
            $sql = 'DELETE FROM lien_hes WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            file_put_contents('error_log.txt', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo "Lỗi Truy Vấn:" . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
 }