<?php 
require_once ('classes.php');

class statisticsController extends Controller{
    public function orders(){

        require ('language/textCommon.php');
        require ('language/textStatistics.php');
        require ('config.php');
    
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;

        require ('views/statistics/orders.php');
        
    }

    public function drinks(){

        require ('language/textCommon.php');
        require ('language/textStatistics.php');
        require ('config.php');
        
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;

        require('models/statisticsModel.php');
        $statisticsModelInstance = new statisticsModel;
    
        $allDrinks = $statisticsModelInstance ->getOrderedDrinks();

        require ('views/statistics/drinks.php');
    }


    public function dishes(){

        require ('language/textCommon.php');
        require ('language/textStatistics.php');
        require ('config.php');
        
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;

        require('models/statisticsModel.php');
        $statisticsModelInstance = new statisticsModel;
    
        $allDishes = $statisticsModelInstance ->getOrderedDishes();

        require ('views/statistics/dishes.php');
    }

    public function ajaxOrdersButton(){
        $action = isset($_POST['action']) ? $_POST['action'] : null;
        $period = isset($_POST['period']) ? $_POST['period'] : null;

        require('models/statisticsModel.php');
        $statisticsModelInstance = new statisticsModel;

        $periodOrders = $statisticsModelInstance -> getPeriodOrders($period);

        echo $period;
    }
}
?>