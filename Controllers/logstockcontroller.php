<?php 
require_once 'helpers/flash.php';
require_once 'models/logstock.php';

class logstockcontroller{

    public function read(){
        $no = 1;
        $products = logstock::productname();

        if(!empty($_GET['productid']) && !empty($_GET['type'])){
            $productid = $_GET['productid'];
            $type = $_GET['type'];
            $logs = logstock::producttypefilter($productid, $type);
        } elseif (!empty($_GET['productid'])){
            $productid = $_GET['productid'];
            $logs = logstock::productfilter($productid);
        } elseif(!empty($_GET['type'])){
            $type = $_GET['type'];
            $logs = logstock::typefilter($type);
        } else{
            $logs = logstock::read();
        }

        $success = flash::get('success');
        $error = flash::get('error');
        include 'views/Logstock/read.php';
    }

    public function createform(){
        $products = logstock::productname();
        $error = flash::get('error');

       include 'views/Logstock/create.php';
    }

    public function create(){
        $productid = $_POST['productid'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];

        if(empty($productid) || empty($type) || $quantity){
            flash::set('error','Product, category and quantity cannot be empty');
            header("Location: index.php?action=createformlogstock");
            exit();
        } else{
            $result = logstock::create($productid, $type, $quantity);
            if($result){
                flash::set('success', 'Stock updated successfully');
            } else{
                flash::set('error', 'Failed to update stock');
            }

            header("Location: index.php?action=readlogstocks");
            exit();
        }
    }

    public function delete($id){
        logstock::delete($id);
        flash::set('success','Log deleted successfully');
        header("Location: index.php?action=readlogstocks");
        exit();
    }
}

?>