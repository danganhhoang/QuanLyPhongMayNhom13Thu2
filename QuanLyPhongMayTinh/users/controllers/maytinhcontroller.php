<?php
require_once 'BaseController.php';

class MayTinhController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $search = $_GET['search'] ?? '';
        $result = $this->model->read($search);
        $mayTinhList = $result->fetchAll(PDO::FETCH_ASSOC);
        $this->render('maytinh/index', ['mayTinhList' => $mayTinhList]);
    }

    // public function create() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $maPhong = $_POST['maPhong'];
    //         $tenMay = $_POST['tenMay'];
    //         $cauHinh = $_POST['cauHinh'];
    //         $trangThai = $_POST['trangThai'];
    //         $hinhAnh = $_POST['hinhAnh'];

    //         $this->model->create($maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh);

    //         header('Location: index.php?controller=mayTinh&action=index');
    //         exit();
    //     }
    //     // $this->render('maytinh/create');
    //     $phongMayList = $this->model->getPhongMayList();
    //     $this->render('maytinh/create', ['phongMayList' => $phongMayList]);
    // }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maPhong = $_POST['maPhong'];
            $tenMay = $_POST['tenMay'];
            $cauHinh = $_POST['cauHinh'];
            $trangThai = $_POST['trangThai'];
            
            // Xử lý tải lên hình ảnh
            $hinhAnh = '';
            if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] == 0) {
                $uploadDir = 'uploads/';
                
                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                // Kiểm tra loại file
                $fileType = strtolower(pathinfo($_FILES['hinhAnh']['name'], PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($fileType, $allowedTypes)) {
                    // Tạo tên file ngẫu nhiên để tránh trùng lặp
                    $newFileName = uniqid() . '.' . $fileType;
                    $uploadFile = $uploadDir . $newFileName;
                    
                    if (move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $uploadFile)) {
                        $hinhAnh = $uploadFile;
                    }
                } else {
                    // Xử lý lỗi loại file không hợp lệ
                    echo "File tải lên không phải là hình ảnh.";
                    return;
                }
            }
    
            // Tạo mới máy tính
            $this->model->create($maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh);
    
            // Chuyển hướng sau khi tạo thành công
            header('Location: index.php?controller=mayTinh&action=index');
            exit();
        }
        $phongMayList = $this->model->getPhongMayList();
        $this->render('maytinh/create', ['phongMayList' => $phongMayList]);
    }
    
    
        
    

    // public function update() {
    //     $id = $_GET['id'] ?? null;

    //     if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $maPhong = $_POST['maPhong'];
    //         $tenMay = $_POST['tenMay'];
    //         $cauHinh = $_POST['cauHinh'];
    //         $trangThai = $_POST['trangThai'];
    //         $hinhAnh = $_POST['hinhAnh'];

    //         $this->model->update($id, $maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh);

    //         header('Location: index.php?controller=mayTinh&action=index');
    //         exit();
    //     }

    //     if ($id) {
    //         $mayTinh = $this->model->find($id);
    //         if ($mayTinh) {
    //             $this->render('maytinh/update', ['mayTinh' => $mayTinh]);
    //         } else {
    //             echo "Máy tính không tồn tại.";
    //         }
    //     } else {
    //         echo "ID không hợp lệ.";
    //     }
    // }

    public function delete() {
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->model->delete($id);
            header('Location: index.php?controller=mayTinh&action=index');
            exit();
        }

        echo "ID không hợp lệ.";
    }
    // public function update() {
    //     $id = $_GET['id'] ?? null;
    
    //     if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $maPhong = $_POST['maPhong'];
    //         $tenMay = $_POST['tenMay'];
    //         $cauHinh = $_POST['cauHinh'];
    //         $trangThai = $_POST['trangThai'];
    
    //         // Xử lý upload hình ảnh
    //         $hinhAnh = $_POST['hinhAnh'];  // Sử dụng tên file ảnh từ form
    //         if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
    //             $uploadDir = 'uploads/';
    //             $hinhAnh = $uploadDir . basename($_FILES['hinhAnh']['name']);
    //             move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $hinhAnh);
    //         }
    
    //         $this->model->update($id, $maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh);
    
    //         header('Location: index.php?controller=mayTinh&action=index');
    //         exit();
    //     }
    
    //     if ($id) {
    //         $mayTinh = $this->model->find($id);
    //         $phongMayList = $this->model->getPhongMayList();
    //         if ($mayTinh) {
    //             $this->render('maytinh/update', ['mayTinh' => $mayTinh, 'phongMayList' => $phongMayList]);
    //         } else {
    //             echo "Máy tính không tồn tại.";
    //         }
    //     } else {
    //         echo "ID không hợp lệ.";
    //     }
    // }
    public function update() {
        $id = $_GET['id'] ?? null;
    
        if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $maPhong = $_POST['maPhong'];
            $tenMay = $_POST['tenMay'];
            $cauHinh = $_POST['cauHinh'];
            $trangThai = $_POST['trangThai'];
            
            // Xử lý tải lên hình ảnh
            $hinhAnh = $_POST['currentHinhAnh']; // Giá trị hiện tại của hình ảnh
            if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] == 0) {
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($_FILES['hinhAnh']['name']);
                if (move_uploaded_file($_FILES['hinhAnh']['tmp_name'], $uploadFile)) {
                    $hinhAnh = $uploadFile;
                }
            }
    
            $this->model->update($id, $maPhong, $tenMay, $cauHinh, $trangThai, $hinhAnh);
    
            header('Location: index.php?controller=mayTinh&action=index');
            exit();
        }
    
        if ($id) {
            $mayTinh = $this->model->find($id);
            if ($mayTinh) {
                $phongMayList = $this->model->getPhongMayList();
                $this->render('maytinh/update', ['mayTinh' => $mayTinh, 'phongMayList' => $phongMayList]);
            } else {
                echo "Máy tính không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }
    

    public function thongKe() {
        $soMayDangHoatDong = $this->model->countMayDangHoatDong();
        $soMayDangSuaChua = $this->model->countMayDangSuaChua();
        $this->render('maytinh/thongke', [
            'soMayDangHoatDong' => $soMayDangHoatDong,
            'soMayDangSuaChua' => $soMayDangSuaChua
        ]);
    }


    public function userView() {
        $result = $this->model->read(); // Truy xuất tất cả dữ liệu máy tính
        $mayTinhList = $result->fetchAll(PDO::FETCH_ASSOC); // Lấy tất cả dữ liệu dưới dạng mảng liên kết
        $this->render('maytinh/userview', ['mayTinhList' => $mayTinhList]); // Truyền dữ liệu vào view
    }
    
}



?>
