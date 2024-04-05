<?php

class AddressenController extends Controller {


    public function __construct($dbc) {
        parent::__construct($dbc);
    }

    public function defaultAction() {
        $main_address = $this->userModel->getMainVersandAddresseFromUser($_SESSION['userId']);
        $other_address = $this->userModel->getVersandAddressenByUserId($_SESSION['userId']);
        $this->runView('addressen', [
            'main_address' => $main_address,
            'other_address' => $other_address,
            'back' => $_GET['back'] ?? $_POST['back'] ?? null
        ]);
    }

    public function showCreateAddressAction() {
        include_once 'config/globals.php';
        $this->runView('create-address', ['stateName' => $stateName]);
    }

    public function createAddressAction() {
        $_POST['new_address']['user_id'] = $_SESSION['userId'];
        $res = $this->userModel->createVersandAddress($_POST['new_address']);
        return header('location: /baumarkt2/addressen');
    }

    public function setAddressAsMainAction() {
        $res = $this->userModel->setMainVersandAddress($_POST['address_id']);
        if($res && $_POST['back'] === 'true') {
            return header('location: /baumarkt2/addressen?back=true');
        }
        if($res) {
            return header('location: /baumarkt2/addressen');
        }
        if(!$res) die('Something went wrong while updating the main address');
    }

}