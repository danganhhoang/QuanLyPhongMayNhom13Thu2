<?php

require_once 'BaseController.php';

class NguoiDungController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $search = $_GET['search'] ?? '';
        $result = $this->model->read($search); 
        $nguoiDungList = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->render('nguoidung/index', ['nguoiDungList' => $nguoiDungList]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenNguoiDung = $_POST['tenNguoiDung'];
            $email = $_POST['email'];
            $matKhau = $_POST['matKhau'];

            $this->model->create($tenNguoiDung, $email, $matKhau);

            header('Location: index.php?controller=nguoiDung&action=index');
            exit();
        }

        $this->render('nguoidung/create');
    }

    public function update() {
        $id = $_GET['id'] ?? null;

        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenNguoiDung = $_POST['tenNguoiDung'];
            $email = $_POST['email'];
            $matKhau = $_POST['matKhau'];

            $this->model->update($id, $tenNguoiDung, $email, $matKhau);

            header('Location: index.php?controller=nguoiDung&action=index');
            exit();
        }

        if ($id) {
            $nguoiDung = $this->model->find($id);
            if ($nguoiDung) {
                $this->render('nguoidung/update', ['nguoiDung' => $nguoiDung]);
            } else {
                echo "Người dùng không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->delete($id);
            header('Location: index.php?controller=nguoiDung&action=index');
            exit();
        }

        echo "ID không hợp lệ.";
    }
}

?>
