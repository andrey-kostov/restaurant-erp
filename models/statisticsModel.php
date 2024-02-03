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
                
                array_push($orderedDishes,$orderedDish);
            }

            return $orderedDishes;
        }

        
        public function getTotalOrders(){
            
        }
    }