<?php
require_once '../config/database.php';

class BaseModel {
    protected $conn;
    protected $table;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    protected function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function execute($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }
}
?>
