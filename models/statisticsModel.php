<?php 

    require_once ('classes.php');

    class statisticsModel extends Model{

        private $statisticsModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->statisticsModelInstance = new Model();
        }

        public function getOrderedDrinks(){
            require ('models/drinksModel.php');
            $drinksModelInstance = new drinksModel;
            
            $orderedDrinks = [];

            //Get all drinks
            $drinksList = $drinksModelInstance->getAllDrinks();
            
            //Get ordered drinks
            foreach ($drinksList as &$drink){
                $orderedDrink = [];
                $orderedDrink['drink_name'] = $drink['drink_name'];
                $orderedDrink['drink_quantity'] = 0;
                $orderedDrink['drink_home_price'] = $drink['drink_home_price'];
                $orderedDrink['drink_price'] = $drink['drink_price'];

                $allOrderedDrink = $drinksModelInstance->getOrderedDrinksById($drink['drink_id']);
                
                foreach($allOrderedDrink as $ordered){
                    $orderedDrink['drink_quantity'] = $orderedDrink['drink_quantity'] + $ordered['qty'];
                } 
                
                $orderedDrink['drink_profit'] = ($orderedDrink['drink_price'] - $orderedDrink['drink_home_price']) * $orderedDrink['drink_quantity'];
                
                array_push($orderedDrinks,$orderedDrink);
            }

            return $orderedDrinks;
        }

        
        public function getOrderedDishes(){
            require ('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;
            
            $orderedDishes = [];

            //Get all dishes
            $dishesList = $dishesModelInstance->getAllDishes();

            //Get ordered dishes
            foreach ($dishesList as &$dish){
                $orderedDish = [];
                $orderedDish['dish_name'] = $dish['dish_name'];
                $orderedDish['dish_quantity'] = 0;
                $orderedDish['dish_price'] = $dish['dish_price'];

                $allOrderedDishes = $dishesModelInstance->getOrderedDishesById($dish['dish_id']);
                foreach($allOrderedDishes as $ordered){
                    $orderedDish['dish_quantity'] = $orderedDish['dish_quantity'] + $ordered['qty'];
                } 
                
                $ingredients = json_decode(unserialize($dish['dish_ingredients']),true); 
                $ingredientsPrice = 0;
                foreach ($ingredients as $ingredient){
                    $ingredientsPrice = $ingredient['ingredientPrice'] + $ingredientsPrice;
                }

                $orderedDish['dish_cost'] = $ingredientsPrice;
                $orderedDish['dish_profit'] = $dish['dish_price'] - $ingredientsPrice;

                array_push($orderedDishes,$orderedDish);
            }

            return $orderedDishes;
        }

        
        public function getPeriodOrders($period){
            
            $sql = "SELECT * FROM `orders` WHERE `order_date` >= DATE_SUB(NOW(), INTERVAL ".$period." DAY)";
            $stmt = $this->statisticsModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $orders = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $orders; 
            }
        }

        //Get ordered drinks by order id
        public function getOrderedDrinksByOrderId($order_id){
            $sql = "SELECT * FROM `orders_drinks` WHERE `order_id` = ".$order_id;
            $stmt = $this->statisticsModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $orderedDrinks = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $orderedDrinks; // returns result
            }
    
            return false;
        }

        //Get ordered dishes by order id
        public function getOrderedDishesByOrderId($orderId){
            $sql = "SELECT * FROM `orders_dishes` WHERE `order_id` = ".$orderId;
            $stmt = $this->statisticsModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $orderedDishes = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $orderedDishes; // returns result
            }
    
            return false;
        }

    }