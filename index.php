<?php 
session_start();

require_once 'Config/database.php';
require_once 'Controllers/authcontroller.php';
require_once 'Controllers/dashboardcontroller.php';
require_once 'Controllers/productcontroller.php';
require_once 'Controllers/categorycontroller.php';
require_once 'Controllers/logstockcontroller.php';

if(isset($_GET['action'])){
    $action = $_GET['action'];
} else{
    $action = '';
}

$authcontroller = new authcontroller;
$dashboardcontroller = new dashboardcontroller;
$productcontroller = new productcontroller;
$categorycontroller = new categorycontroller;
$logstockcontroller = new logstockcontroller;

switch ($action){
    case 'login':
        $authcontroller->login();
        break;
    case 'registerform':
        $authcontroller->registerform();
        break;
    case 'register':
        $authcontroller->register();
        break;
    case 'logout':
        $authcontroller->logout();
        break;
    case 'dashboard':
        $dashboardcontroller->dashboard();
        break;
    case 'readproducts':
        $productcontroller->read();
        break;
    case 'createformproduct':
        $productcontroller->createform();
        break;
    case 'createproduct':
        $productcontroller->create();
        break;
    case 'updateformproduct':
        $productcontroller->updateform($_GET['id']);
        break;
    case 'updateproduct':
        $productcontroller->update($_GET['id']);
        break;
    case 'deleteproduct':
        $productcontroller->delete($_GET['id']);
        break;
    case 'readcategories':
        $categorycontroller->read();
        break;
    case 'createformcategory':
        $categorycontroller->createform();
        break;
    case 'createcategory':
        $categorycontroller->create();
        break;
    case 'updateformcategory':
        $categorycontroller->updateform($_GET['id']);
        break;
    case 'updatecategory':
        $categorycontroller->update($_GET['id']);
        break;
    case 'deletecategory':
        $categorycontroller->delete($_GET['id']);
        break;
    case 'readlogstocks':
        $logstockcontroller->read();
        break;
    case 'createformlogstock':
        $logstockcontroller->createform();
        break;
    case 'createlogstock':
        $logstockcontroller->create();
        break;
    case 'deletelogstock':
        $logstockcontroller->delete($_GET['id']);
        break;
    default:
        $authcontroller->index();
        break;
}

?>