<?php
require_once 'helpers/flash.php';
require_once 'models/dashboard.php';


class dashboardcontroller{

    public function dashboard(){
        $success = flash::get('success');
        $totalproducts = dashboard::totalproducts();
        $totalcategories = dashboard::totalcategories();
        $totallowstock = dashboard::totallowstock();
        $stockvalue = dashboard::stockvalue();
        $lowstock = dashboard::lowstock();
        $stockreport = dashboard::stockreport();

        include 'views/Dashboard/dashboard.php';
    }
}
?>