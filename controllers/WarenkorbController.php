<?php

class WarenkorbController extends Controller {

    public function __construct($dbc) {
        parent::__construct($dbc);
    }

    public function defaultAction() {
        // session_unset();
        // session_destroy();
        include_once 'config/fields_index_page.inc.php';
        $products = $this->warenkorb->getAllProducts();
        $total_price = $this->warenkorb->getTotalPrice();
        $this->runView('warenkorb', [
            'products' => $products,
            'total_price' => $total_price,
            'page' => $page
        ]);
    }

}