<?php


class ProductsController extends Controller {

    private $productsModel;


    public function __construct(PDO $dbc) {
        parent::__construct($dbc);
        $this->productsModel = new ProductsModel($dbc);
    }

    public function defaultAction($params) {
        include_once ROOT_PATH . 'config/fields_index_page.inc.php';
        $data = $this->productsModel->getProductsFromKatZwei($params[1]);
        $products = $data['products'];
        $katzwei = $data['katzwei'];
        $this->runView('products', [
            'products' => $products,
            'katzwei' => $katzwei,
            'page' => $page
        ]);
    }

    public function showAction($params) {
        include_once ROOT_PATH . 'config/fields_index_page.inc.php';
        $product = $this->productsModel->getProductById(intval($params[1]));
        $katzwei = $this->productsModel->getKatzweiById(intval($product['katzwei_id']));
        $this->runView('product', [
            'product' => $product,
            'katzwei' => $katzwei,
            'page' => $page
        ]);
    }

    public function addWarenkorbAction() {
        $product = $_POST['product'];
        if(intval($product['menge']) < 1) {
            $product = false;
        }
        $prev_url = $_POST['prev_url'];
        $res = $this->warenkorb->addProduct($product);
        if($res !== false) {
            header("location: $prev_url?product_added=true");
        } else {
            header("location: $prev_url?product_added=false");
        }
    }

    public function removeWarenkorbAction() {
        $this->warenkorb->removeProduct();
        $this->warenkorb->updateTotalPrice();
        header('location: /baumarkt2/warenkorb');
    }

}


// /home
// /products/action/id
// /products/categories/category_name/category_id