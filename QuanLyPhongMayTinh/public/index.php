<?php

require_once '../config/database.php';

require_once '../models/PhongMay.php';
require_once '../controllers/PhongMayController.php';

require_once '../models/NguoiQuanLy.php';
require_once '../controllers/NguoiQuanLyController.php';


require_once '../models/MayTinh.php';
require_once '../controllers/MayTinhController.php';


require_once '../models/NguoiDung.php';
require_once '../controllers/NguoiDungController.php';

require_once '../models/LichDatPhong.php';
require_once '../controllers/LichDatPhongController.php';

require_once '../models/LichSuSuDung.php';
require_once '../controllers/LichSuSuDungController.php';

require_once '../models/ThongKe.php';
require_once '../controllers/ThongKeController.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize models
$phongMayModel = new PhongMay($db);
$mayTinhModel = new MayTinh($db);
$nguoiDungModel = new NguoiDung($db);
$NguoiQuanLyModel = new QuanLy($db);
$LichDatPhongModel = new LichDatPhong($db);
$LichSuSuDungModel = new LichSuSuDung($db);
$ThongkeModel = new ThongKeModel($db);
// Initialize controllers
$phongMayController = new PhongMayController($phongMayModel);
$maytinhController = new MayTinhController($mayTinhModel);
$nguoiDungController = new NguoiDungController($nguoiDungModel);
$NguoiQuanLyController = new QuanLyController($NguoiQuanLyModel);
$LichDatPhongController = new LichDatPhongController($LichDatPhongModel);
$LichSuSuDungController = new LichSuSuDungController($LichSuSuDungModel);
$ThongKeController = new ThongKeController($ThongkeModel);
// Handle request
$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'phongMay';

switch ($controller) {
    case 'phongMay':
        switch ($action) {
            case 'index':
                $phongMayController->index();
                break;
            case 'create':
                $phongMayController->create();
                break;
            case 'update':
                $phongMayController->update();
                break;
            case 'delete':
                $phongMayController->delete();
                break;
                // Add other cases for update, delete if needed
            default:
                $phongMayController->index();
                break;
        }
    case 'mayTinh':
        switch ($action) {
            case 'index':
                $maytinhController->index();
                break;
            case 'create':
                $maytinhController->create();
                break;
            case 'update':
                $maytinhController->update();
                break;
            case 'delete':
                $maytinhController->delete();
                break;
            case 'userView': // Thêm trường hợp cho userView
                $maytinhController->userView();
                break;
                // Add other cases for update, delete if needed
            default:
                $maytinhController->index();
                break;
        }
    case 'nguoiDung':
        switch ($action) {
            case 'index':
                $nguoiDungController->index();
                break;
            case 'create':
                $nguoiDungController->create();
                break;
            case 'update':
                $nguoiDungController->update();
                break;
            case 'delete':
                $nguoiDungController->delete();
                break;
                // Add other cases for update, delete if needed
            default:
                $nguoiDungController->index();
                break;
        }
    case 'quanLy': // Thêm case cho QuanLy
        switch ($action) {
            case 'index':
                $NguoiQuanLyController->index();
                break;
            case 'create':
                $NguoiQuanLyController->create();
                break;
            case 'update':
                $NguoiQuanLyController->update();
                break;
            case 'delete':
                $NguoiQuanLyController->delete();
                break;
            default:
                $NguoiQuanLyController->index();
                break;
        }
    case 'lichDatPhong': // Thêm case cho QuanLy
        switch ($action) {
            case 'index':
                $LichDatPhongController->index();
                break;
            case 'create':
                $LichDatPhongController->create();
                break;
            case 'update':
                $LichDatPhongController->update();
                break;
            case 'delete':
                $LichDatPhongController->delete();
                break;
            default:
                $LichDatPhongController->index();
                break;
        }
    case 'lichSuSuDung': // Thêm case cho QuanLy
        switch ($action) {
            case 'index':
                $LichSuSuDungController->index();
                break;
            case 'create':
                $LichSuSuDungController->create();
                break;
            case 'update':
                $LichSuSuDungController->update();
                break;
            case 'delete':
                $LichSuSuDungController->delete();
                break;
            
            default:
                $LichSuSuDungController->index();
                break;
        }
    case 'thongKe': // Thêm case cho QuanLy
        switch ($action) {
            case 'index':
                $ThongKeController->index();
                break;
        }
        break;
    default:
        echo "Controller not found!";
        break;
}

?>