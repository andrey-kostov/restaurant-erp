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

                //@ToDo - get all ordered products in drink_quantity
                
                $orderedDrink['drink_profit'] = ($orderedDrink['drink_price'] - $orderedDrink['drink_home_price']) * $orderedDrink['drink_quantity'];
                
                array_push($orderedDrinks,$orderedDrink);
            }

            return $orderedDrinks;
        }

        
        public function getOrderedDishes(){
            
        }

        
        public function getTotalOrders(){
            
        }
    }