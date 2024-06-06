<?php
class LichDatPhong {
    private $conn;
    private $table_name = "lichdatphong";

    public $maLichDat;
    public $maPhong;
    public $maNguoiDung;
    public $ngayDat;
    public $thoiGianBatDau;
    public $thoiGianKetThuc;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search_phong = '', $search_nguoidung = '') {
        $query = "SELECT ld.*, pm.tenPhong, nd.tenNguoiDung 
                  FROM " . $this->table_name . " ld
                  JOIN phongmay pm ON ld.maPhong = pm.maPhong
                  JOIN nguoidung nd ON ld.maNguoiDung = nd.maNguoiDung
                  WHERE 1=1";

        if ($search_phong) {
            $query .= " AND pm.tenPhong LIKE :search_phong";
        }
        if ($search_nguoidung) {
            $query .= " AND nd.tenNguoiDung LIKE :search_nguoidung";
        }
       
        $stmt = $this->conn->prepare($query);

        if ($search_phong) {
            $search_phong = "%$search_phong%";
            $stmt->bindParam(':search_phong', $search_phong);
        }
        if ($search_nguoidung) {
            $search_nguoidung = "%$search_nguoidung%";
            $stmt->bindParam(':search_nguoidung', $search_nguoidung);
        }
       
        $stmt->execute();
        return $stmt;
    }

    public function create($maPhong, $maNguoiDung, $ngayDat, $thoiGianBatDau, $thoiGianKetThuc) {
        $query = "INSERT INTO " . $this->table_name . " (maPhong, maNguoiDung, ngayDat, thoiGianBatDau, thoiGianKetThuc) VALUES (:maPhong, :maNguoiDung, :ngayDat, :thoiGianBatDau, :thoiGianKetThuc)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':maPhong', $maPhong);
        $stmt->bindParam(':maNguoiDung', $maNguoiDung);
        $stmt->bindParam(':ngayDat', $ngayDat);
        $stmt->bindParam(':thoiGianBatDau', $thoiGianBatDau);
        $stmt->bindParam(':thoiGianKetThuc', $thoiGianKetThuc);

        return $stmt->execute();
    }

    public function find($id) {
        $query = "SELECT ld.*, pm.tenPhong, nd.tenNguoiDung 
                  FROM " . $this->table_name . " ld
                  JOIN phongmay pm ON ld.maPhong = pm.maPhong
                  JOIN nguoidung nd ON ld.maNguoiDung = nd.maNguoiDung
                  WHERE ld.maLichDat = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $maPhong, $maNguoiDung, $ngayDat, $thoiGianBatDau, $thoiGianKetThuc) {
        $query = "UPDATE " . $this->table_name . " SET maPhong = :maPhong, maNguoiDung = :maNguoiDung, ngayDat = :ngayDat, thoiGianBatDau = :thoiGianBatDau, thoiGianKetThuc = :thoiGianKetThuc WHERE maLichDat = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':maPhong', $maPhong);
        $stmt->bindParam(':maNguoiDung', $maNguoiDung);
        $stmt->bindParam(':ngayDat', $ngayDat);
        $stmt->bindParam(':thoiGianBatDau', $thoiGianBatDau);
        $stmt->bindParam(':thoiGianKetThuc', $thoiGianKetThuc);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE maLichDat = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function getPhongList() {
        $query = "SELECT maPhong, tenPhong FROM phongmay";
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
