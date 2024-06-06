<?php
class ThongKeModel {
    private $conn;

    // Constructor để thiết lập kết nối đến cơ sở dữ liệu
    public function __construct($db) {
        $this->conn = $db;
    }

    // Phương thức để lấy dữ liệu thống kê
    public function getThongKeData() {
        $queryMayTinh = "SELECT SUM(CASE WHEN trangThai = 'Hoạt động' THEN 1 ELSE 0 END) as soMayDangHoatDong,
                                SUM(CASE WHEN trangThai = 'Đang sửa chữa' THEN 1 ELSE 0 END) as soMayDangSuaChua
                         FROM maytinh";
    
        $stmtMayTinh = $this->conn->prepare($queryMayTinh);
        $stmtMayTinh->execute();
        $resultMayTinh = $stmtMayTinh->fetch(PDO::FETCH_ASSOC);
    
        $queryNguoiDung = "SELECT COUNT(*) as soLuongNguoiDung FROM nguoidung";
        $stmtNguoiDung = $this->conn->prepare($queryNguoiDung);
        $stmtNguoiDung->execute();
        $resultNguoiDung = $stmtNguoiDung->fetch(PDO::FETCH_ASSOC);
    
        return [
            'soMayDangHoatDong' => $resultMayTinh['soMayDangHoatDong'],
            'soMayDangSuaChua' => $resultMayTinh['soMayDangSuaChua'],
            'soLuongNguoiDung' => $resultNguoiDung['soLuongNguoiDung']
        ];
    }
    
}
?>
