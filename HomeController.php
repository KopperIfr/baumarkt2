<?php

class HomeController extends Controller {

    public function __construct($dbc)
    {
        parent::__construct($dbc);
    }

    public function defaultAction() 
    {
        // Fetching data with help from Products Model..
        $productsModel = new ProductsModel($this->dbc);
        $categories = $productsModel->getCategories();

        // Including static data stored in files..
        include_once ROOT_PATH . 'config/fields_index_page.inc.php';

        // Sending the data to the view and displaying it..
        $this->runView('home', [
            'page' => $page, 
            'kategorien' => $categories
        ]);
    }

}