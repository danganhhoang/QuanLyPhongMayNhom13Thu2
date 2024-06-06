<?php
class NguoiDung {
    private $conn;
    private $table_name = "nguoidung";

    public $maNguoiDung;
    public $tenNguoiDung;
    public $email;
    public $matKhau;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT * FROM " . $this->table_name;
        if ($search) {
            $query .= " WHERE tenNguoiDung LIKE :search";
        }
        $stmt = $this->conn->prepare($query);

        if ($search) {
            $search = "%$search%";
            $stmt->bindParam(':search', $search);
        }

        $stmt->execute();
        return $stmt;
    }

    public function create($tenNguoiDung, $email, $matKhau) {
        $query = "INSERT INTO " . $this->table_name . " (tenNguoiDung, email, matKhau) VALUES (:tenNguoiDung, :email, :matKhau)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tenNguoiDung', $tenNguoiDung);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':matKhau', $matKhau);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function find($id) {
        $query = "SELECT * FROM " .  $this->table_name . " WHERE maNguoiDung = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $tenNguoiDung, $email, $matKhau) {
        $query = "UPDATE " .  $this->table_name . " SET tenNguoiDung = :tenNguoiDung, email = :email, matKhau = :matKhau WHERE maNguoiDung = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tenNguoiDung', $tenNguoiDung);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':matKhau', $matKhau);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " .  $this->table_name . " WHERE maNguoiDung = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
