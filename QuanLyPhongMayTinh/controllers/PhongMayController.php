<?php
require_once 'BaseController.php';

class PhongMayController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

//     public function index() {
//         $result = $this->model->read();
//         $phongMayList = $result->fetchAll(PDO::FETCH_ASSOC);
//         $this->render('phongmay/index', ['phongMayList' => $phongMayList]);
//     }

//     public function create() {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Xử lý dữ liệu từ form
//             $tenPhong = $_POST['tenPhong'];
//             $viTri = $_POST['viTri'];

//             // Thêm mới phòng máy
//             $this->model->create($tenPhong, $viTri);

//             // Chuyển hướng về trang danh sách phòng máy
//             header('Location: index.php?controller=phongMay&action=index');
//             exit();
//         }

//         $this->render('phongmay/create');
//     }


//     public function update() {
//         $id = $_GET['id'] ?? null;

//         if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
//             $tenPhong = $_POST['tenPhong'];
//             $viTri = $_POST['viTri'];

//             $this->model->update($id, $tenPhong, $viTri);

//             header('Location: index.php?controller=phongMay&action=index');
//             exit();
//         }

//         if ($id) {
//             $phongMay = $this->model->find($id);
//             if ($phongMay) {
//                 $this->render('phongmay/update', ['phongMay' => $phongMay]);
//             } else {
//                 echo "Phòng máy không tồn tại.";
//             }
//         } else {
//             echo "ID không hợp lệ.";
//         }
//     }

//     public function delete() {
//         $id = $_GET['id'] ?? null;

//         if ($id) {
//             $this->model->delete($id);
//             header('Location: index.php?controller=phongMay&action=index');
//             exit();
//         }

//         echo "ID không hợp lệ.";
//     }
// }


    public function index() {
        $search = $_GET['search'] ?? '';
        $result = $this->model->read($search);
        $phongMayList = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->render('phongmay/index', ['phongMayList' => $phongMayList]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenPhong = $_POST['tenPhong'];
            $viTri = $_POST['viTri'];

            $this->model->create($tenPhong, $viTri);

            header('Location: index.php?controller=phongMay&action=index');
            exit();
        }

        $this->render('phongmay/create');
    }

    public function update() {
        $id = $_GET['id'] ?? null;

        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenPhong = $_POST['tenPhong'];
            $viTri = $_POST['viTri'];

            $this->model->update($id, $tenPhong, $viTri);

            header('Location: index.php?controller=phongMay&action=index');
            exit();
        }

        if ($id) {
            $phongMay = $this->model->find($id);
            if ($phongMay) {
                $this->render('phongmay/update', ['phongMay' => $phongMay]);
            } else {
                echo "Phòng máy không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->delete($id);
            header('Location: index.php?controller=phongMay&action=index');
            exit();
        }

        echo "ID không hợp lệ.";
    }
}


?>
