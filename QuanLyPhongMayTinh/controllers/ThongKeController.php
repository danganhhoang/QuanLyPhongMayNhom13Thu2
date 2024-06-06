<?php
require_once 'BaseController.php';

class ThongKeController extends BaseController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $thongKeData = $this->model->getThongKeData();
        $this->render('thongke/index', ['thongKeData' => $thongKeData]);
    }
    
}
?>
