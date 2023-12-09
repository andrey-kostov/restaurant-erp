<?php 

    require_once ('classes.php');

    class dishesAllController extends Controller{

        private $dishesAllController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->dishesAllController = new Controller();
        }

        public function index(){
        
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require('models/dishesModel.php');
            require 'config.php';
        
            $root = $globalRoot;
            $storeCurrency = $globalCurrency;
            $dishesModelInstance = new dishesModel;

            //Delete dish
            if (isset($_POST['action']) && $_POST['action'] == 'deleteDish') {
                $dishId = isset($_POST['dishId']) ? $_POST['dishId'] : null;
                $dishesModelInstance->deleteDish( $dishId);
            }

            //Get all dishes
            $dishesResult = $dishesModelInstance->getAllDishes(); 
            $allDishes = [];
            foreach ($dishesResult as $dishes){
                $thisId = $dishes['dish_category'];
                $thisCategory = $dishesModelInstance->getDishesCategories($thisId);
            
                $unserializedData = unserialize($dishes['dish_ingredients']);
                $item = array(
                    'id' => $dishes['id'],
                    'dish_id' => $dishes['dish_id'],
                    'dish_name' => $dishes['dish_name'],
                    'dish_recepie' => $dishes['dish_recepie'],
                    'dish_ingredients' => json_decode($unserializedData,true),
                    'dish_price' => $dishes['dish_price'],
                    'dish_category' => isset($thisCategory[0]['category_name']) ? $thisCategory[0]['category_name'] : 'No category'
                );
                $allDishes[] = $item;

            }


            require 'views/dishes/dishesAll.php';
        }
    }