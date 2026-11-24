<?php 
require_once 'Config/database.php';

class product{

    public static function read(){
        global $pdo;
        $sql = "SELECT p.id as id, p.name as product, c.name as category, p.price_buy as buyprice, p.price_sell as sellprice, p.stock as stock
                FROM products p
                JOIN categories c ON p.category_id = c.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($categoryid, $name, $buyprice, $sellprice, $stock){
        global $pdo;
        $sql = "INSERT INTO products(category_id, name, price_buy, price_sell, stock) VALUES (:categoryid, :name, :buyprice, :sellprice, :stock)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['categoryid' => $categoryid, 'name' => $name, 'buyprice' => $buyprice, 'sellprice' => $sellprice, 'stock' => $stock]);
    }

    public static function find($id){
        global $pdo;
        $sql = "SELECT p.name as productname,p.category_id as categoryid, c.name as categoryname, p.price_buy as buyprice, p.price_sell as sellprice, p.stock as stock
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE p.id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($categoryid, $name, $pricebuy, $pricesell, $stock, $id){
        global $pdo;
        $sql = "UPDATE products SET category_id = :categoryid, name = :name, price_buy = :pricebuy, price_sell = :pricesell, stock = :stock WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['categoryid' => $categoryid, 'name' => $name, 'pricebuy' => $pricebuy, 'pricesell' => $pricesell, 'stock' => $stock, 'id' => $id]);
    }

    public static function delete($id){
        global $pdo;
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function search($name){
        global $pdo;
        $sql = "SELECT p.id as id, p.name as product, c.name as category, p.price_buy as buyprice, p.price_sell as sellprice, p.stock as stock
                FROM products p
                JOIN categories c ON p.category_id = c.id
                WHERE p.name LIKE :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => "%$name%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function categoryfilter($categoryid){
        global $pdo;
        $sql = "SELECT p.category_id as categoryid,p.id as id, p.name as product, c.name as category, p.price_buy as buyprice, p.price_sell as sellprice, p.stock as stock
                FROM products p
                JOIN categories c ON p.category_id = c.id WHERE category_id = :categoryid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['categoryid' => $categoryid]);
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public static function categoryname(){
        global $pdo;
        $sql = "SELECT id,name FROM categories";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>