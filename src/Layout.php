<?php

class Layout {
    public function view($file, $data = null) {
        if($data !== null) extract($data);
        include_once VIEW_PATH . 'layouts' . DIRECTORY_SEPARATOR . 'layout.php';
    }
}









// echo '<pre>';
// var_dump($data);
// echo '<pre>';