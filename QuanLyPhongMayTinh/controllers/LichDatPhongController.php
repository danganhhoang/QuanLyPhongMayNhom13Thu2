<?php
require_once 'BaseController.php';

class LichDatPhongController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $search = $_GET['search'] ?? '';
        $result = $this->model->read($search);
        $lichDatPhongList = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->render('lichdatphong/index', ['lichDatPhongList' => $lichDatPhongList]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maPhong = $_POST['maPhong'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $ngayDat = $_POST['ngayDat'];
            $thoiGianBatDau = $_POST['thoiGianBatDau'];
            $thoiGianKetThuc = $_POST['thoiGianKetThuc'];
            if ($this->model->create($maPhong, $maNguoiDung, $ngayDat, $thoiGianBatDau, $thoiGianKetThuc)) {
                header('Location: ?controller=lichDatPhong&action=index');
            }
        } else {
            
            $phongList = $this->model->getPhongList();
            $nguoiDungList = $this->model->getNguoiDungList();
            $this->render('lichdatphong/create', ['phongList' => $phongList, 'nguoiDungList' => $nguoiDungList]);
        }
    }

    public function update() {
        $id = $_GET['id'] ?? null;
        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $maPhong = $_POST['maPhong'];
            $maNguoiDung = $_POST['maNguoiDung'];
            $ngayDat = $_POST['ngayDat'];
            $thoiGianBatDau = $_POST['thoiGianBatDau'];
            $thoiGianKetThuc = $_POST['thoiGianKetThuc'];
            if ($this->model->update($id, $maPhong, $maNguoiDung, $ngayDat, $thoiGianBatDau, $thoiGianKetThuc)) {
                header('Location: ?controller=lichDatPhong&action=index');
            }
        } else {
            $lichDatPhong = $this->model->find($id);
            $phongList = $this->model->getPhongList();
            $nguoiDungList = $this->model->getNguoiDungList();
            $this->render('lichdatphong/update', ['lichDatPhong' => $lichDatPhong, 'phongList' => $phongList, 'nguoiDungList' => $nguoiDungList]);
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id && $this->model->delete($id)) {
            header('Location: ?controller=lichDatPhong&action=index');
        }
    }
}
?>
