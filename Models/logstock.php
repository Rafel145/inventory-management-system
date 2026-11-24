<?php 
require_once 'Config/database.php';

class logstock{

    public static function read(){
        global $pdo;
        $sql = "SELECT l.id as id, l.created_at as date, p.name AS productname, l.type as type, l.quantity as quantity
                FROM log_stock l
                JOIN products p ON l.product_id = p.id";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($productid, $type, $quantity){
        global $pdo;
        try{
            $pdo->beginTransaction();

            if($type == 'IN'){
                $sql = "UPDATE products SET stock = stock + :quantity WHERE id = :productid";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['quantity' => $quantity, 'productid' => $productid]);
            } elseif($type == 'OUT'){
                $sql = "UPDATE products SET stock = stock - :quantity WHERE id = :productid";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['quantity' => $quantity, 'productid' => $productid]);
            }

            $sql = "INSERT INTO log_stock(product_id, type, quantity) VALUES (:productid, :type, :quantity)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['productid' => $productid,'type' => $type, 'quantity' => $quantity]);
            $pdo->commit();
            return true;
        } catch(PDOException $e){
            $pdo->rollBack();
            return false;
        }
    }

    public static function delete($id){
        global $pdo;
        $sql = "DELETE FROM log_stock WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

   public static function productfilter($productid){
        global $pdo;
        $sql = "SELECT l.id as id, l.created_at as date, p.name AS productname, l.type as type, l.quantity as quantity
                FROM log_stock l
                JOIN products p ON l.product_id = p.id WHERE l.product_id = :productid";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['productid' => $productid]);
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public static function typefilter($type){
        global $pdo;
        $sql = "SELECT l.id as id,l.created_at as date, p.name AS productname, l.type as type, l.quantity as quantity
                FROM log_stock l
                JOIN products p ON l.product_id = p.id WHERE l.type = :type";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['type' => $type]);
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

     public static function producttypefilter($productid, $type){
        global $pdo;
        $sql = "SELECT l.id as id,l.created_at as date, p.name AS productname, l.type as type, l.quantity as quantity
                FROM log_stock l
                JOIN products p ON l.product_id = p.id 
                WHERE p.id = :productid AND l.type = :type";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['productid' => $productid, 'type' => $type]);
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public static function productname(){
        global $pdo;
        $sql = "SELECT id,name FROM products";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>