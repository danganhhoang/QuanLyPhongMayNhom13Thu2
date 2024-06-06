<?php
class QuanLy {
    private $conn;
    private $table_name = "nguoiquanly"; // Bảng nguoiquanly

    public $maQuanLy;
    public $tenQuanLy;
    public $email;
    public $soDienThoai; // Thuộc tính mới soDienThoai

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT * FROM " . $this->table_name;
        if ($search) {
            $query .= " WHERE tenQuanLy LIKE :search";
        }
        $stmt = $this->conn->prepare($query);

        if ($search) {
            $search = "%$search%";
            $stmt->bindParam(':search', $search);
        }

        $stmt->execute();
        return $stmt;
    }

    public function create($tenQuanLy, $email, $soDienThoai) {
        $query = "INSERT INTO " . $this->table_name . " (tenQuanLy, email, soDienThoai) VALUES (:tenQuanLy, :email, :soDienThoai)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tenQuanLy', $tenQuanLy);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':soDienThoai', $soDienThoai);

        return $stmt->execute();
    }

    public function find($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE maQuanLy = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $tenQuanLy, $email, $soDienThoai) {
        $query = "UPDATE " . $this->table_name . " SET tenQuanLy = :tenQuanLy, email = :email, soDienThoai = :soDienThoai WHERE maQuanLy = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tenQuanLy', $tenQuanLy);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':soDienThoai', $soDienThoai);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE maQuanLy = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
