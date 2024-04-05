<?php

class BestellungModel extends Model{
    private $bestellungen = [];

    public function __construct($dbc) {
        parent::__construct($dbc);
    }

    public function createBestellung($bestellung) {
        $bestellung_num = mt_rand(1000000000, 9999999999);

        while ($this->bestellungExists($bestellung_num)) 
        {
            $bestellung_num = mt_rand(1000000000, 9999999999);
        }

        $bestellung['bestellung_num'] = $bestellung_num;
        $_SESSION['bestellungen'][$bestellung_num] = $bestellung;
        if($_SESSION['userId']) {
            $res = $this->insertBestellung($bestellung);
            $res2 = $this->insertProdToBestellung($bestellung);
        }
    }

    public function insertBestellung($bestellung) {

        $sql = "INSERT INTO bestellungen(bestellung_num, versandaddresse_id, bestellung_status, bestellung_date, user_id, bestellung_cc_type, bestellung_cc_last_numbs)
        VALUES(:bestellung_num, :versandaddresse_id, :bestellung_status, :bestellung_date, :user_id, :bestellung_cc_type , :bestellung_cc_last_numbs)";
        try {
            $date = DateTime::createFromFormat('d-m-Y', $bestellung['bestellung_date']);
            $bestellung_date = $date->format('Y-m-d');
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':bestellung_num', $bestellung['bestellung_num'], PDO::PARAM_INT);
            $stmt->bindParam(':versandaddresse_id', $bestellung['versandAddresseData']['id'], PDO::PARAM_INT);
            $stmt->bindParam(':bestellung_status', $bestellung['bestellung_status'], PDO::PARAM_STR);
            $stmt->bindParam(':bestellung_date', $bestellung_date, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $bestellung['versandAddresseData']['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':bestellung_cc_type', $bestellung['bestellung_cc_type'], PDO::PARAM_STR);
            $stmt->bindParam(':bestellung_cc_last_numbs', $bestellung['bestellung_cc_last_numbs'], PDO::PARAM_INT);
            $stmt->execute();
            return true; // Retorna verdadero si la inserción es exitosa
        } catch (PDOException $e) {
            // Manejar el error aquí (por ejemplo, registrar el error, lanzar una excepción, etc.)
            return $e->getMessage(); // Retorna falso si hay un error en la inserción
        }
    }


    public function insertProdToBestellung($bestellung) {
        $sql = "INSERT INTO products_to_bestellung(bestellung_num, product_id, product_menge, product_total_price) 
                VALUES(:bestellung_num, :product_id, :product_menge, :product_total_price)";
        try {
            $stmt = $this->dbc->prepare($sql);
            foreach($bestellung['products'] as $index => $product) {
                $stmt->bindParam(':bestellung_num', $bestellung['bestellung_num'], PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $product['id'], PDO::PARAM_INT);
                $stmt->bindParam(':product_menge', $product['menge'], PDO::PARAM_INT);
                $stmt->bindParam(':product_total_price', $product['total_price'], PDO::PARAM_STR);
                $stmt->execute();
            }
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    

    public function bestellungExists($num) {
        $sql = "SELECT COUNT(*) as count FROM bestellungen WHERE bestellung_num = :num";
        $stmt = $this->dbc->prepare($sql);
        $stmt->bindParam(':num', $num, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && $result['count'] > 0 && isset($_SESSION['bestellungen'][$num])) {
            return true;
        } else {
            return false; 
        }
    }

    public function getAllBestellungen() {
        return $this->bestellungen;
    }

    public function isBestellungByUserId($id) {
        include_once MODEL_PATH . 'UserModel.php';
        include_once MODEL_PATH . 'ProductsModel.php';
        $userModel = new UserModel($this->dbc);
        $productsModel = new ProductsModel($this->dbc);

        $bestellungen = $this->getBestellungenByUserId($id);
        if($bestellungen === false) return false;
        $AllBestellungen = [];
        $best_total_price = 0;

        foreach($bestellungen as $index => $bestellung) {
            $numb = $bestellung['bestellung_num'];
            $products_to_bestellung = $this->getProductsToBestellung($numb);
            $AllBestellungen[$numb] = [
                'bestellung_num' => $numb,
                'versandAddresseData' => '',
                "bestellung_status" => $bestellung['bestellung_status'],
                "bestellung_date" => $bestellung['bestellung_date'],
                "user_id" => $id,
                "products" => [],
                'total_price' => 0,
                'bestellung_cc_type' => $bestellung['bestellung_cc_type'],
                'bestellung_cc_last_numbs' => $bestellung['bestellung_cc_last_numbs']
            ];

            $versandAddresse = $userModel->getVersandAddresseById($bestellung['versandaddresse_id']);
            $AllBestellungen[$numb]['versandAddresseData'] = $versandAddresse;

            foreach($products_to_bestellung as $index => $field) {
                $product = $productsModel->getProductById($field['product_id']);
                $new_product = [
                    'menge' => $field['product_menge'],
                    'id' => $product['katalog_nr'],
                    'name' => $product['name'],
                    'fabrikat' => $product['fabrikat'],
                    'best_nr' => $product['best_nr'],
                    'price' => $product['preis'],
                    'pr_beschr' => $product['pr_beschr'],
                    'img' => $product['img'],
                    'katzwei_id' => $product['katzwei_id'],
                    'total_price' => $field['product_total_price']
                ];
                $best_total_price += floatval($field['product_total_price']);
                $AllBestellungen[$numb]['products'][$index] = $new_product;
                $AllBestellungen[$numb]['total_price'] += floatval($field['product_total_price']);
            }
        }
        $bestellungen = $AllBestellungen;
        return $bestellungen;
    }

    public function getBestellungenByUserId($id) {
        $sql = "SELECT * FROM bestellungen WHERE user_id = :user_id";
        try {

            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $bestellungen = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $bestellungen;
        } catch (PDOException $e) {

            return false;
        }
    }

    public function getProductsToBestellung($best_num) {
        $sql = "SELECT * FROM products_to_bestellung  WHERE bestellung_num = :bestellung_num";
        try {
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(':bestellung_num', $best_num, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {

            return false;
        }
    }
    
}