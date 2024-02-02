<?php 
require_once ('classes.php');

class statisticsController extends Controller{
    public function orders(){

        require ('language/textCommon.php');
        require ('config.php');
    
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;

        echo 'orders';
        
        // require ('views/settings.php');
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
        require ('config.php');
    
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;

        echo 'dishes';
        
        // require ('views/settings.php');
    }
}
?>