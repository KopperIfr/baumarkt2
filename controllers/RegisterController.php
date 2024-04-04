<?php

class RegisterController extends Controller {

    private $validator;

    public function __construct(PDO $dbc) {
        parent::__construct($dbc);
        $this->validator = new Validator($dbc);
    }

    public function defaultAction() {
        $this->runView('register', []);
    }

    public function registerAction() {
        $user = $_POST['user'];
        $result = $this->validator->validate($user, $user['email'], $user['pwd'], $user['rpwd']);
        if($result !== true) {
            $this->runView('register', [
                'err_msg' => $result
            ]);
        } else {
            $this->runView('register', [
                'success_msg' => 'Sie haben sich erfolgreich registriert!'
            ]);
        }
    }

}