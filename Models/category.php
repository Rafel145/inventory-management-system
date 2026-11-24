<?php
require_once 'Config/database.php';

class category{

    public static function read(){
        global $pdo;
        $sql = "SELECT * FROM categories";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($name){
        global $pdo;
        $sql = "INSERT INTO categories(name) VALUES (:name)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['name' => $name]);
    }

    public static function find($id){
        global $pdo;
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public static function update($name, $id){
        global $pdo;
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'id' => $id]);
    }

    public static function delete($id){
        global $pdo;
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function deletehandle($id){
        global $pdo;
        $sql = "SELECT COUNT(*) FROM products where category_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetchColumn() > 0;
    }

    public static function search($name){
        global $pdo;
        $sql = "SELECT *
                FROM categories
                WHERE name LIKE :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => "%$name%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>