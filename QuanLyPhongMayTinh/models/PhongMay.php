<?php
class PhongMay {
    private $conn;
    private $table_name = "phongmay";

    public $maPhong;
    public $tenPhong;
    public $viTri;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT * FROM " . $this->table_name;
        if ($search) {
            $query .= " WHERE tenPhong LIKE :search";
        }
        $stmt = $this->conn->prepare($query);

        if ($search) {
            $search = "%$search%";
            $stmt->bindParam(':search', $search);
        }

        $stmt->execute();
        return $stmt;
    }

    public function create($tenPhong, $viTri) {
        $query = "INSERT INTO " . $this->table_name . " (tenPhong, viTri) VALUES (:tenPhong, :viTri)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tenPhong', $tenPhong);
        $stmt->bindParam(':viTri', $viTri);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function find($id) {
        $query = "SELECT * FROM " .  $this->table_name . " WHERE maPhong = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $tenPhong, $viTri) {
        $query = "UPDATE " .  $this->table_name . " SET tenPhong = :tenPhong, viTri = :viTri WHERE maPhong = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tenPhong', $tenPhong);
        $stmt->bindParam(':viTri', $viTri);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " .  $this->table_name . " WHERE maPhong = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
