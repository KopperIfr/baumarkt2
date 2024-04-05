<?php

class ProductsModel extends Model{
    private $kateins;
    private $katzwei;
    private $products;
    private $categories_ordered;

    public function __construct($dbc)
    {
        parent::__construct($dbc);
        $this->kateins = $this->getAllTableData('kateins');
        $this->katzwei = $this->getAllTableData('katzwei');
        $this->products = $this->getAllTableData('katalog');
        $this->categories_ordered = $this->getCategoriesOrdered();
    }

    private function getCategoriesOrdered() {
        $categories = [];
        foreach ($this->kateins as $kateins) {
            $category = [];
            foreach ($this->katzwei as $katzwei) {
                if($kateins['id'] === $katzwei['kateins_id']) {
                    $category[$katzwei['id'] - 1] = [
                        'id' => $katzwei['id'],
                        'name' => $katzwei['name'],
                        'img' => $katzwei['img']
                    ];
                }
            }
            $categories[$kateins['id'] - 1] = [
                'name' => $kateins['name'],
                'sub_categories' => $category
            ];
        }
        return $categories;
    }

    public function getProductById($id) {
        $product = null;
        foreach ($this->products as $productt) {
            if($productt['katalog_nr'] === $id) $product = $productt;
        }
        return $product;
    }

    public function getKatzweiById($id) {
        $katzwei = null;
        foreach ($this->katzwei as $katzweii) {
            if($katzweii['id'] === $id) $katzwei = $katzweii;
        }
        return $katzwei;
    }

    public function getProductsFromKatZwei($id) {
        $products = [];
        $katzwei_name = '';
        foreach ($this->products as $product) {
            if(intval($id) === $product['katzwei_id']) array_push($products, $product);
        }
        foreach($this->katzwei as $katzwei) {
            if($katzwei['id'] === intval($id) ) $katzwei_name = $katzwei['name'];
        }
        return ['products' => $products, 'katzwei' => $katzwei_name];
    }

    public function updateProductsModel($dbc) {
        new self($dbc);
    }

    public function getCategories() {
        return $this->categories_ordered;
    }

    public function getKatEins() {
        return $this->kateins;
    }

    public function getKatZwei() {
        return $this->katzwei;
    }

    public function getKatProducts() {
        return $this->products;
    }
}