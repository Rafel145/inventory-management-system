<?php 
require_once 'Config/database.php';

class auth{
    public static function register($username, $hashed_password){
        global $pdo;
        $sql = "INSERT INTO users(username,password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['username' => $username, 'password' => $hashed_password]);
    }
    
    public static function login($username){
        global $pdo;
        $sql = "SELECT id, password, username FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function checkusername($username){
        global $pdo;
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        return $stmt->fetchColumn() > 0;
    }
}
?>