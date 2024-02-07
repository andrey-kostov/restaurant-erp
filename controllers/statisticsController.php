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
        require('models/drinksModel.php');
        require('models/dishesModel.php');

        $statisticsModelInstance = new statisticsModel;
        $drinksModelInstance = new drinksModel;
        $dishesModelInstance = new dishesModel;

        $periodOrders = $statisticsModelInstance -> getPeriodOrders($period);

        $periodOrdersInformation = [];

        foreach ($periodOrders as &$order){
            $orderInformation['order_id'] = $order['id'];
            $orderInformation['order_table'] = $order['table_id'];
            $orderInformation['order_date'] = $order['order_date'];

            $ordered_dishes = $statisticsModelInstance->getOrderedDishesByOrderId($order['id']);
            $ordered_drinks = $statisticsModelInstance->getOrderedDrinksByOrderId($order['id']);

            foreach($ordered_drinks as $drink){
                
                $drink_information = [];
                $information = $drinksModelInstance->getSingleDrink($drink['drink_id']);
                
                $drink_information['qty'] = $drink['qty'];
                $drink_information['drink_name'] = $information[0]['drink_name'];
                $drink_information['drink_home_price'] = $information[0]['drink_home_price'];
                $drink_information['drink_price'] = $information[0]['drink_price'];
                $drink_information['drink_profit'] = $information[0]['drink_price'] - $information[0]['drink_home_price']; 
                $drink_information['drink_total_price'] = $drink['qty'] * $drink_information['drink_price'];
                $drink_information['drink_total_profit'] = $drink['qty'] * $drink_information['drink_profit'];
                
                var_dump($drink_information);

                array_push($ordered_drinks_information,$drink_information);
            }

            $ordered_dishes_information = [];           
            $ordered_drinks_information = [];       

            $orderInformation['ordered_dishes'] = $ordered_dishes_information;
            $orderInformation['ordered_drinks'] = $ordered_drinks_information;

            array_push($periodOrdersInformation,$orderInformation);
        }

        echo json_encode($periodOrdersInformation);
    }
}
?>