<?php 
class flash{
    public static function set($type, $messege){
        session_start();
        $_SESSION['flash'][$type] = $messege;
    }

    public static function get($type){
        if(isset($_SESSION['flash'][$type])){
            $messege = $_SESSION['flash'][$type];
            unset($_SESSION['flash'][$type]);
            return $messege;
        } else{
           return '' ;
        }
    }
}

?>