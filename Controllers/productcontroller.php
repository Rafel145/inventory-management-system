<?php 
require_once 'helpers/flash.php';
require_once 'models/product.php';

class productcontroller{

    public function read(){
        $no = 1;
        $categories = product::categoryname();

        if(!empty($_GET['name'])){
            $name = $_GET['name'];
            $products = product::search($name);
            if(empty($products)){
                $error = 'Product not found';
            }
        } elseif(!empty($_GET['categoryid'])){
            $categoryid = $_GET['categoryid'];
            $products = product::categoryfilter($categoryid);
        } else{
            $products = product::read();
        }

        $success = flash::get('success');
        include 'views/product/read.php';
    }

    public function createform(){
        $product = product::read();
        $categories = product::categoryname();
        $error = flash::get('error');
        include 'views/product/create.php';
    }

    public function create(){
        $categoryid = $_POST['categoryid'];
        $name = $_POST['name'];
        $buyprice = $_POST['buyprice'];
        $sellprice = $_POST['sellprice'];
        $stock = $_POST['stock'];

        if(empty($categoryid) || empty($name)){
            flash::set('error', 'Product name or category cannot be empty');
            header("Location: index.php?action=createformproduct");
            exit();
        } else{
            product::create($categoryid, $name, $buyprice, $sellprice, $stock);
            flash::set('success','Product added successfully');
            header("Location: index.php?action=readproducts");
            exit();
        }
    }

    public function updateform($id){
        $product = product::find($id);
        $categories = product::categoryname();
        $error = flash::get('error');
        include 'views/product/update.php';
    }

    public function update($id){
        $categoryid = $_POST['categoryid'];
        $name = $_POST['name'];
        $buyprice = $_POST['buyprice'];
        $sellprice = $_POST['sellprice'];
        $stock = $_POST['stock'];

         if(empty($categoryid) || empty($name)){
            flash::set('error', 'Product name or category cannot be empty');
            header("Location: index.php?action=updateformproduct&id=$id");
            exit();
        } else{
            product::update($categoryid, $name, $buyprice, $sellprice, $stock, $id);
            flash::set('success','Product updated successfully');
            header("Location: index.php?action=readproducts");
            exit();
        }
    }

    public function delete($id){
        product::delete($id);
        flash::set('success','Product deleted successfully');
        header("Location: index.php?action=readproducts");
        exit();
    }
}

?>