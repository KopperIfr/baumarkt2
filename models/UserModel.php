<?php

class UserModel extends Model {

    public function __construct($dbc) {
        parent::__construct($dbc);
    }

    public function checkLoginUser($user) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam('email', $user['email'], PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($user['pwd'], $row['pwd'])) {
                $_SESSION['userId'] = $row['id'];
                $_SESSION['userEmail'] = $row['email'];
                $_SESSION['userName'] = $row['name'];
                return true;
            } else {
                return "Password nicht richtig!";
            }
        } else {
            return "Email nicht gefunden!";
        }
    }

    public function registerUser($user) {
        $res = $this->checkEmailExists($user['email']);
        if($res !== false) return false;
        $hashedPwd = password_hash($user['pwd'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(name, email, pwd) VALUES(:name, :email, :pwd)";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':name', $user['name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $stmt->bindParam(':pwd', $hashedPwd, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
    }

    private function checkEmailExists($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getMainVersandAddresseFromUser($id) {
        $sql = "SELECT * FROM addresen WHERE user_id = :id AND main = 1";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            $mainVersandAddresse = $stmt->fetch(PDO::FETCH_ASSOC);
            return $mainVersandAddresse;
        } else {
            return false;
        }
    }

    public function getVersandAddressenByUserId($id) {
        $versandAddressen = [];
        $sql = "SELECT * FROM addresen WHERE user_id = :id AND main = 0";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($versandAddressen, $row);
            }
        }
        return $versandAddressen;
    }

    public function getVersandAddresseById($id) {
        $sql = "SELECT * FROM addresen WHERE id = :id";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function createVersandAddress($data) {
        $hasVersandAddress = $this->getVersandAddressenByUserId($_SESSION['userId']);
        $setAsMain = $hasVersandAddress === [] ? 1 : 0;
        $sql = "INSERT INTO addresen(vers_name, email, telefon, vers_strasse, vers_ort, vers_postl, staat, user_id, main)
        VALUES(:vers_name, :email, :telefon, :vers_strasse, :vers_ort, :vers_postl, :staat, :user_id, $setAsMain)";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':vers_name', $data['vers_name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':telefon', $data['telefon'], PDO::PARAM_STR);
        $stmt->bindParam(':vers_strasse', $data['vers_strasse'], PDO::PARAM_STR);
        $stmt->bindParam(':vers_ort', $data['vers_ort'], PDO::PARAM_STR);
        $stmt->bindParam(':vers_postl', $data['vers_postl'], PDO::PARAM_INT);
        $stmt->bindParam(':staat', $data['staat'], PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            return true;
        }
    }

    public function setMainVersandAddress($newmain_address_id) {
        $this->dbc->beginTransaction(); // Iniciar transacción

        try {
            // Paso 1: Actualizar todas las direcciones para establecer main = 0, excepto la nueva dirección principal
            $sqlUpdateOthers = "UPDATE addresen SET main = 0 WHERE user_id = :user_id AND id != :new_main_id";
            $stmtUpdateOthers = $this->dbc->prepare($sqlUpdateOthers);
            $stmtUpdateOthers->bindParam(':user_id', $_SESSION['userId'], PDO::PARAM_INT);
            $stmtUpdateOthers->bindParam(':new_main_id', $newmain_address_id, PDO::PARAM_INT);
            $stmtUpdateOthers->execute();
    
            // Paso 2: Actualizar la nueva dirección principal para establecer main = 1
            $sqlUpdateMain = "UPDATE addresen SET main = 1 WHERE id = :new_main_id";
            $stmtUpdateMain = $this->dbc->prepare($sqlUpdateMain);
            $stmtUpdateMain->bindParam(':new_main_id', $newmain_address_id, PDO::PARAM_INT);
            $stmtUpdateMain->execute();
    
            // Confirmar transacción
            $this->dbc->commit();
            
            return true;
        } catch (PDOException $e) {
            // Revertir cambios en caso de error
            $this->dbc->rollBack(); 
            return false;
        }
    }
}

