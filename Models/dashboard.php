<?php 
require_once 'Config/database.php';

// |total produk: 40 | total kategori: 4 | stok menipis: 3 | total nilai stock:Rp14.000.000
//
// |stock menipis |     //Laporan stock 1 minggu
// |nama  stock |       // tanggal      produk  tipe    jumlah
// |aqua  3 |           //  15/08/2026  indomie IN      3
class dashboard{
    
    public static function totalproducts(){
        global $pdo;
        $sql = "SELECT COUNT(*) FROM products";
        $stmt = $pdo->query($sql);
        return $stmt->fetchColumn();
    }

    public static function totalcategories(){
        global $pdo;
        $sql = "SELECT COUNT(*) FROM categories";
        $stmt = $pdo->query($sql);
        return $stmt->fetchColumn();
    }

    public static function totallowstock(){
        global $pdo;
        $sql = "SELECT COUNT(*) FROM products WHERE stock <= 5";
        $stmt = $pdo->query($sql);
        return $stmt->fetchColumn();
    }

    public static function stockvalue(){
        global $pdo;
        $sql = "SELECT SUM(price_buy * stock) FROM products";
        $stmt = $pdo->query($sql);
        return $stmt->fetchColumn();
    }

    public static function  lowstock(){
        global $pdo;
        $sql = "SELECT name, stock FROM products WHERE stock <=5";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    public static function stockreport(){
        global $pdo;
        $sql = "SELECT l.created_at as date, p.name as product, l.type as type, l.quantity as quantity
                FROM log_stock l 
                JOIN products p ON l.product_id = p.id
                WHERE l.created_at >= NOW() - INTERVAL 7 DAY";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }
}

?>