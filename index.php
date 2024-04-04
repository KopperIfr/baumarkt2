<?php

session_start();
if(!isset($_SESSION['bestellungen'])) $_SESSION['bestellungen'] = [];

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('CONTROLLER_PATH', ROOT_PATH . 'controllers' . DIRECTORY_SEPARATOR);
define('MODEL_PATH', ROOT_PATH . 'models' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . 'public' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$sub_section = $_GET['sub_section'] ?? $_POST['sub_section'] ?? '';
$name = $_GET['name'] ?? $_POST['name'] ?? '';
$id = $_GET['id'] ?? $_POST['id'] ?? '';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

// including Base Classes..
include_once './src/Warenkorb.php';
include_once './src/Controller.php';
include_once './src/Database.php';
include_once './src/Layout.php';
include_once './src/Validator.php';
include_once './src/Model.php';
include_once './config/functions.php';

// including Models..
include_once MODEL_PATH . 'ProductsModel.php';
include_once MODEL_PATH . 'BestellungModel.php';
include_once MODEL_PATH . 'UserModel.php';


//displayArray($_SESSION);

// starting database..
Database::setInstance();
$dbc = Database::getConnection();

$controllerName = ucfirst($section) . 'Controller';
$controllerPath = CONTROLLER_PATH . $controllerName . '.php';

if(file_exists($controllerPath)) {
    include_once $controllerPath;
    $controller = new $controllerName($dbc);
    if($name !== '' || $id !== '' || $sub_section !== '') {
        $controller->runAction($action, [$name, $id, $sub_section]);
    } else {
        $controller->runAction($action);
    }
}































































// $fields = [];
// $stmt = $dbc->prepare("SELECT * FROM katalog");
// $stmt->execute();
// if($stmt) {
//     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         array_push($fields, $row);
//     }
// }

// var_dump($fields);