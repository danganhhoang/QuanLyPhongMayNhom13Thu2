<?php
require_once 'BaseController.php';

class QuanLyController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $search = $_GET['search'] ?? '';
        $result = $this->model->read($search);
        $quanLyList = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->render('nguoiquanly/index', ['quanLyList' => $quanLyList]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenQuanLy = $_POST['tenQuanLy'];
            $email = $_POST['email'];
            $soDienThoai = $_POST['soDienThoai'];

            $this->model->create($tenQuanLy, $email, $soDienThoai);

            header('Location: index.php?controller=quanLy&action=index');
            exit();
        }

        $this->render('nguoiquanly/create');
    }

    public function update() {
        $id = $_GET['id'] ?? null;

        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenQuanLy = $_POST['tenQuanLy'];
            $email = $_POST['email'];
            $soDienThoai = $_POST['soDienThoai'];

            $this->model->update($id, $tenQuanLy, $email, $soDienThoai);

            header('Location: index.php?controller=quanLy&action=index');
            exit();
        }

        if ($id) {
            $quanLy = $this->model->find($id);
            if ($quanLy) {
                $this->render('nguoiquanly/update', ['quanLy' => $quanLy]);
            } else {
                echo "Quản lý không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->delete($id);
            header('Location: index.php?controller=quanLy&action=index');
            exit();
        }

        echo "ID không hợp lệ.";
    }
}
?>
