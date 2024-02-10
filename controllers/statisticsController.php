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

    public function ajaxOrdersTotal(){
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $period = isset($_POST['period']) ? $_POST['period'] : null;

        require('models/statisticsModel.php');
        require('models/drinksModel.php');
        require('models/dishesModel.php');

        $statisticsModelInstance = new statisticsModel;
        $drinksModelInstance = new drinksModel;
        $dishesModelInstance = new dishesModel;

        if($type === 'dynamic'){
            $periodOrders = $statisticsModelInstance -> getDynamicPeriodOrders($period);
        }else{
            $periodOrders = $statisticsModelInstance -> getFixedPeriodOrders($period);
        }


        $periodOrdersInformation = [];

        foreach ($periodOrders as &$order){
            $orderInformation['order_id'] = $order['id'];
            $orderInformation['order_table'] = $order['table_id'];
            $orderInformation['order_date'] = date("d.m.Y", strtotime($order['order_date']));

            $orderedDishes = $statisticsModelInstance->getOrderedDishesByOrderId($order['id']);
            $orderedDrinks = $statisticsModelInstance->getOrderedDrinksByOrderId($order['id']);

            $orderedDishesInformation = [];           
            $orderedDrinksInformation = []; 
            
            $orderTotal = 0;
            $orderTotal_profit = 0;

            foreach($orderedDrinks as $drink){
                
                $drinkInformation = [];
                $information = $drinksModelInstance->getSingleDrink($drink['drink_id']);
                
                $drinkInformation['qty'] = $drink['qty'];
                $drinkInformation['drink_name'] = $information[0]['drink_name'];
                $drinkInformation['drink_home_price'] = $information[0]['drink_home_price'];
                $drinkInformation['drink_price'] = (float)$information[0]['drink_price'];
                $drinkInformation['drink_profit'] = $information[0]['drink_price'] - $information[0]['drink_home_price']; 
                $drinkInformation['drink_total_price'] = $drink['qty'] * $drinkInformation['drink_price'];
                $drinkInformation['drink_total_profit'] = $drink['qty'] * $drinkInformation['drink_profit'];

                $orderTotal = $orderTotal + $drinkInformation['drink_total_price'];
                $orderTotal_profit = $orderTotal_profit + $drinkInformation['drink_total_profit'];
                
                array_push($orderedDrinksInformation,$drinkInformation);
            }

            foreach($orderedDishes as $dish){
                
                $dishInformation = [];
                $information = $dishesModelInstance->getSingleDish($dish['dish_id']);

                $ingredients = json_decode(unserialize($information[0]['dish_ingredients']),true); 
                $ingredientsPrice = 0;
                foreach ($ingredients as $ingredient){
                    $ingredientsPrice = $ingredient['ingredientPrice'] + $ingredientsPrice;
                }

                $dishInformation['qty'] = $dish['qty'];
                $dishInformation['dish_name'] = $information[0]['dish_name'];
                $dishInformation['dish_home_price'] = $ingredientsPrice;
                $dishInformation['dish_price'] = (float)$information[0]['dish_price'];
                $dishInformation['dish_profit'] = $information[0]['dish_price'] - $ingredientsPrice; 
                $dishInformation['dish_total_price'] = $dish['qty'] * $dishInformation['dish_price'];
                $dishInformation['dish_total_profit'] = $dish['qty'] * $dishInformation['dish_profit'];

                $orderTotal = $orderTotal + $dishInformation['dish_total_price'];
                $orderTotal_profit = $orderTotal_profit + $dishInformation['dish_total_profit'];
                
                array_push($orderedDishesInformation,$dishInformation);
            }

            $orderInformation['ordered_dishes'] = $orderedDishesInformation;
            $orderInformation['ordered_drinks'] = $orderedDrinksInformation;
            $orderInformation['order_total'] = $orderTotal;
            $orderInformation['order_total_profit'] = $orderTotal_profit; 

            array_push($periodOrdersInformation,$orderInformation);
        }

        echo json_encode($periodOrdersInformation);
    }
}
?>