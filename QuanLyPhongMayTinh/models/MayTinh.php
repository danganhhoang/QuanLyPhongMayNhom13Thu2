<?php
class MayTinh {
    private $conn;
    private $table = 'maytinh';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT * FROM " . $this->table;
        if ($search) {
            $query .= " WHERE tenMay LIKE :search";
        }
        $stmt = $this->conn->prepare($query);

        if ($search) {
            $search = "%$search%";
            $stmt->bindParam(':search', $search);
        }

        $stmt->execute();
        return $stmt;
    }
    public function create($maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh) {
        $query = "INSERT INTO " . $this->table . " (maPhong, tenMay, cauHinh, trangThai, hinhAnh) VALUES (:maPhong, :tenMay, :cauHinh, :trangThai, :hinhAnh)";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':maPhong', $maPhong);
        $stmt->bindParam(':tenMay', $tenMay);
        $stmt->bindParam(':cauHinh', $cauHinh);
        $stmt->bindParam(':trangThai', $trangThai);
        $stmt->bindParam(':hinhAnh', $hinhAnh);
    
        return $stmt->execute();
    }
    
    // public function create($maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh) {
    //     $query = "INSERT INTO " . $this->table . " (maPhong, tenMay, cauHinh, trangThai, hinhAnh) VALUES (:maPhong, :tenMay, :cauHinh, :trangThai, :hinhAnh)";
    //     $stmt = $this->conn->prepare($query);

    //     $stmt->bindParam(':maPhong', $maPhong);
    //     $stmt->bindParam(':tenMay', $tenMay);
    //     $stmt->bindParam(':cauHinh', $cauHinh);
    //     $stmt->bindParam(':trangThai', $trangThai);
    //     $stmt->bindParam(':hinhAnh', $hinhAnh);

    //     return $stmt->execute();
    // }

    public function find($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE maMay = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh) {
        $query = "UPDATE " . $this->table . " SET maPhong = :maPhong, tenMay = :tenMay, cauHinh = :cauHinh, trangThai = :trangThai, hinhAnh = :hinhAnh WHERE maMay = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':maPhong', $maPhong);
        $stmt->bindParam(':tenMay', $tenMay);
        $stmt->bindParam(':cauHinh', $cauHinh);
        $stmt->bindParam(':trangThai', $trangThai);
        $stmt->bindParam(':hinhAnh', $hinhAnh);

        return $stmt->execute();
    }

    public function delete($id) {
        // Xóa các dòng liên quan trong lichsusudung trước
        $queryLichSu = "DELETE FROM lichsusudung WHERE maMay = :id";
        $stmtLichSu = $this->conn->prepare($queryLichSu);
        $stmtLichSu->bindParam(':id', $id);
        $stmtLichSu->execute();
    
        // Sau đó xóa dòng trong bảng maytinh
        $query = "DELETE FROM " . $this->table . " WHERE maMay = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();

    }

    public function getPhongMayList() {
        $query = "SELECT maPhong, tenPhong FROM phongmay";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countMayDangHoatDong() {
        $query = "SELECT COUNT(*) as count FROM maytinh WHERE trangThai = 'Đang Hoạt Động'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
    
    public function countMayDangSuaChua() {
        $query = "SELECT COUNT(*) as count FROM maytinh WHERE trangThai = 'Đang Sửa Chữa'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
    
}


?>
