<?php
class Validator {

    private $err_msg;
    private $dbc;

    public function __construct($dbc) {
        $this->dbc = $dbc;
    }

    public function validate($fields, $email, $pwd, $rpwd = '') {
        include_once MODEL_PATH . 'UserModel.php';
        $userModel = new UserModel($this->dbc);
        if($this->isEmpty($fields) === true) return $this->err_msg;
        if($this->isValidEmail($email) === false) return $this->err_msg;
        if($this->fieldsLength($fields) === false) return $this->err_msg;
        if($this->pwdHasSpecialCharakters($pwd) === false) return $this->err_msg;
        if($this->pwdIsRpwd($pwd, $rpwd) === false) return $this->err_msg;
        if($userModel->registerUser($fields) === false){
            $this->err_msg = "Diesen Email ist schon registriert!";
            return $this->err_msg;
        }
        return true;
    }

    private function isEmpty($fields) {
        foreach ($fields as $field) {
            if(empty($field)) {
                $this->err_msg = "Sie müssen alle Daten eingeben!";
                return true;
            }
        } 
        return false;
    }

    private function isValidEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->err_msg = "Geben Sie eine gültige Email Addresse ein!";
            return false;
        }
    }

    private function fieldsLength($fields) {
        foreach ($fields as $index => $field) {
            if(($index === 'name' || $index === 'pwd') && strlen($field) < 3) {
                $this->err_msg = "Mindestens 3 Charakteren bei Name und Password!";
                return false;
            }
        }
        return true; 
    }

    private function pwdHasSpecialCharakters($pwd) {
        $pattern = '/^(?=.*[!@#$%^&*()-_=+[\]{}|;:,.<>?])(?=.*[0-9]).*$/';
        if (preg_match($pattern, $pwd)) {
            return true;
        } else {
            $this->err_msg = "Password must contain at least one special character and one number!"; 
            return false;
        }
    }

    private function pwdIsRpwd($pwd, $rpwd) {
        if($pwd !== $rpwd) {
            $this->err_msg = "Passwords sind nicht gleich!";
            return false;
        } else {
            return true;
        }
    }
}