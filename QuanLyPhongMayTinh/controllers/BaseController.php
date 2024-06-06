<?php
class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        $viewFile = "../views/{$view}.php";
        require_once "../views/layouts/main.php";
    }
}
?>
