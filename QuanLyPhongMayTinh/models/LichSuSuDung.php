<?php

class LichSuSuDung {
    private $conn;
    private $table_name = "lichsusudung";

    public $maSuDung;
    public $maMay;
    public $maNguoiDung;
    public $thoiGianBatDau;
    public $thoiGianKetThuc;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search_may = '') {
        $query = "SELECT ls.*, mt.tenMay, nd.tenNguoiDung 
                  FROM " . $this->table_name . " ls
                  JOIN maytinh mt ON ls.maMay = mt.maMay
                  JOIN nguoidung nd ON ls.maNguoiDung = nd.maNguoiDung
                  WHERE 1=1";
    
        if ($search_may) {
            $query .= " AND mt.tenMay LIKE :search_may";
        }
    
        $stmt = $this->conn->prepare($query);
    
        if ($search_may) {
            $search_may = "%$search_may%";
            $stmt->bindParam(':search_may', $search_may);
        }
    
        $stmt->execute();
        return $stmt;
    }
    

    public function create($maMay, $maNguoiDung, $thoiGianBatDau, $thoiGianKetThuc) {
        $query = "INSERT INTO " . $this->table_name . " (maMay, maNguoiDung, thoiGianBatDau, thoiGianKetThuc) VALUES (:maMay, :maNguoiDung, :thoiGianBatDau, :thoiGianKetThuc)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':maMay', $maMay);
        $stmt->bindParam(':maNguoiDung', $maNguoiDung);
        $stmt->bindParam(':thoiGianBatDau', $thoiGianBatDau);
        $stmt->bindParam(':thoiGianKetThuc', $thoiGianKetThuc);

        return $stmt->execute();
    }

    public function find($id) {
        $query = "SELECT ls.*, mt.tenMay, nd.tenNguoiDung 
                  FROM " . $this->table_name . " ls
                  JOIN maytinh mt ON ls.maMay = mt.maMay
                  JOIN nguoidung nd ON ls.maNguoiDung = nd.maNguoiDung
                  WHERE ls.maSuDung = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $maMay, $maNguoiDung, $thoiGianBatDau, $thoiGianKetThuc) {
        $query = "UPDATE " . $this->table_name . " SET maMay = :maMay, maNguoiDung = :maNguoiDung, thoiGianBatDau = :thoiGianBatDau, thoiGianKetThuc = :thoiGianKetThuc WHERE maSuDung = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':maMay', $maMay);
        $stmt->bindParam(':maNguoiDung', $maNguoiDung);
        $stmt->bindParam(':thoiGianBatDau', $thoiGianBatDau);
        $stmt->bindParam(':thoiGianKetThuc', $thoiGianKetThuc);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE maSuDung = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function getMayList() {
        $query = "SELECT maMay, tenMay FROM maytinh";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNguoiDungList() {
        $query = "SELECT maNguoiDung, tenNguoiDung FROM nguoidung";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
