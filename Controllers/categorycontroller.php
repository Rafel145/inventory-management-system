<?php 
require_once 'helpers/flash.php';
require_once 'models/category.php';

class categorycontroller{

    public function read(){
        $no = 1;
        if(!empty($_GET['name'])){
            $name = $_GET['name'];
            $categories = category::search($name);
            if(empty($categories)){
                $error = 'Category not found';
            }
        } else{
            $categories = category::read();
        }
        $error = flash::get('error');
        $success = flash::get('success');
        include 'views/category/read.php';
    }
    
    public function createform(){
        $error = flash::get('error');
        include 'views/Category/create.php';
    }

    public function create(){
        $name = $_POST['name'];

        if(empty($name)){
            flash::set('error', 'Category name cannot be empty');
            header("Location: index.php?action=createformcategory");
            exit();
        } else{
            category::create($name);
            flash::set('success', 'Category added successfully');
            header("Location: index.php?action=readcategories");
            exit();
        }
    }

    public function updateform($id){
        $category = category::find($id);
        $error = flash::get('error');
        include 'views/Category/update.php';
    }

    public function update($id){
        $name = $_POST['name'];

        if(empty($name)){
            flash::set('error', 'Category name cannot be empty');
            header("Location: index.php?action=updateformcategory&id=$id");
            exit();
        } else{
            category::update($name, $id);
            flash::set('success', 'Category updated successfully');
            header ("Location: index.php?action=readcategories");
            exit();
        }
    }

    public function delete($id){
        if(category::deletehandle($id)){
            flash::set('error', 'This category still has products');
            header("Location: index.php?action=readcategories");
            exit();
        }

        category::delete($id);
        flash::set('success', 'Category deleted successfully');
        header("Location: index.php?action=readcategories");
        exit();
    }
}

?>