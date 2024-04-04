<?php

class BestellungenController extends Controller{

    private $bestellungModel;

    public function __construct($dbc) {
        parent::__construct($dbc);
        $this->bestellungModel = new BestellungModel($dbc);
    }

    public function defaultAction() {
        // session_unset();
        // session_destroy();
        if($_SESSION['userId']) {
            if($this->bestellungModel->isBestellungByUserId($_SESSION['userId']) !== false) {
                $bestellungen = $this->bestellungModel->isBestellungByUserId($_SESSION['userId']);
                $_SESSION['bestellungen'] = $bestellungen;
            }
        }
        //displayArray($_SESSION['bestellungen']);
        $this->runView('bestellungen', [
            'bestellungen' => $_SESSION['bestellungen']
        ]);
    }

    public function showCreateBestellungAction() {
        if($_SESSION['warenkorb'] === null) {
            header('location: /baumarkt2/warenkorb');
            return;
        }
        include_once 'config/globals.php';
        $change = $_GET['change'] ?? $_POST['change'] ?? 'false';
        $changePayment = $_GET['change_payment'] ?? $_POST['change_payment'] ?? 'false';
        $userLoged = false;
        $paymentData = $_POST['payment'];


        if($_SESSION['userId']) 
        {   
            $userLoged = true;
            $versandAddresse = $this->userModel->getMainVersandAddresseFromUser($_SESSION['userId']);
            $_SESSION['versandAddresse'] = $versandAddresse !== false ? $versandAddresse : $_POST['versandAddresse'] ?? $_SESSION['versandAddresse'];
        } 
        
        else 
        
        {
            $_SESSION['versandAddresse'] = $_POST['versandAddresse'] ?? $_SESSION['versandAddresse'];
        }

        $_SESSION['payment'] = $_POST['payment'] ?? $_SESSION['payment'];

        $this->runView('bestellung', [
            'versandAddresseData' => $_SESSION['versandAddresse'],
            'change' => $change,
            'months' => $months,
            'today' => $today,
            'stateName' => $stateName,
            'stateCode' => $stateCode,
            'paymentData' => $paymentData,
            'changePayment' => $changePayment,
            'userLoged' => $userLoged
        ]);
    }


    public function createBestellungAction() {
        if(!isset($_SESSION['versandAddresse']['id'])) $_SESSION['versandAddresse']['id'] = null;
        $bestellung = 
        [
            'versandAddresseData' => $_SESSION['versandAddresse'],
            'products' => $_SESSION['warenkorb'],
            'total_price' => $_SESSION['total_price'],
            'bestellung_date' => date('d-m-Y'),
            'bestellung_status' => 'shipping',
            'bestellung_cc_type' => $_SESSION['payment']['cc_type'],
            'bestellung_cc_last_numbs' => substr($_SESSION['payment']['cc_number'], -4),
            'bestellung_taxrate' => 0.0700
        ];
        $this->bestellungModel->createBestellung($bestellung);
        unset($_SESSION['payment']);
        unset($_SESSION['warenkorb']);
        unset($_SESSION['total_price']);
        header('location: /baumarkt2/bestellungen');
    }

    public function zusammenfassungAction($params) {
        //displayArray($_SESSION['bestellungen'][$params[1]]);
        $id = intval($params[1]);
        $this->runView('summary',['bestellung' => $_SESSION['bestellungen'][$id]]);
    }
}