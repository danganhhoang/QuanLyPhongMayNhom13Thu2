<?php
require_once 'BaseController.php';

class LichSuSuDungController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $search_may = $_GET['search_may'] ?? '';
        $search_nguoidung = $_GET['search_nguoidung'] ?? '';
        $result = $this->model->read($search_may, $search_nguoidung);
        $lichSuSuDungList = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->render('lichsusudung/index', ['lichSuSuDungList' => $lichSuSuDungList]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maMay = $_POST['maMay'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $thoiGianBatDau = $_POST['thoiGianBatDau'];
            $thoiGianKetThuc = $_POST['thoiGianKetThuc'];

            $this->model->create($maMay, $maNguoiDung, $thoiGianBatDau, $thoiGianKetThuc);

            header('Location: index.php?controller=lichSuSuDung&action=index');
            exit();
        }

        $mayList = $this->model->getMayList();
        $nguoiDungList = $this->model->getNguoiDungList();
        $this->render('lichsusudung/create', ['mayList' => $mayList, 'nguoiDungList' => $nguoiDungList]);
    }

    public function update() {
        $id = $_GET['id'] ?? null;

        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $maMay = $_POST['maMay'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $thoiGianBatDau = $_POST['thoiGianBatDau'];
            $thoiGianKetThuc = $_POST['thoiGianKetThuc'];

            $this->model->update($id, $maMay, $maNguoiDung, $thoiGianBatDau, $thoiGianKetThuc);

            header('Location: index.php?controller=lichSuSuDung&action=index');
            exit();
        }

        if ($id) {
            $lichSuSuDung = $this->model->find($id);
            if ($lichSuSuDung) {
                $mayList = $this->model->getMayList();
                $nguoiDungList = $this->model->getNguoiDungList();
                $this->render('lichsusudung/update', ['lichSuSuDung' => $lichSuSuDung, 'mayList' => $mayList, 'nguoiDungList' => $nguoiDungList]);
            } else {
                echo "Lịch sử sử dụng không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->delete($id);
            header('Location: index.php?controller=lichSuSuDung&action=index');
            exit();
        }

        echo "ID không hợp lệ.";
    }
}
?>
