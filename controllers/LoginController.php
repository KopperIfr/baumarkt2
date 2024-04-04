<?php

class LoginController extends Controller{


    public function __construct(PDO $dbc) {
        parent::__construct($dbc);
    }

    public function defaultAction() {
        $this->runView('login', []);
    }

    public function loginAction() {
        $user = $_POST['user'];
        $res = $this->userModel->checkLoginUser($user);
        if($res === true) {
            return header('location: /baumarkt2/');
        } else {
            return $this->runView('login', ['err_msg' => $res]);
        }
    }


    public function logoutAction() {
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);
        unset($_SESSION['versandAddresse']);
        $_SESSION['bestellungen'] = [];
        header('location: /baumarkt2/');
    }

}