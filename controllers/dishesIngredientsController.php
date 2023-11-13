<?php 

    require_once ('classes.php');

    class dishesIngredientsController extends Controller{

        private $dishesIngredientsController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->dishesIngredientsController = new Controller();
        }

        public function index(){
        
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require 'config.php';
            require('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;

            $root = $globalRoot;
            $storeCurrency = $globalCurrency;
            
            //Get all drinks categories for the select
            $ingredientsCategories = $dishesModelInstance->getDishesIngredientsCategories();
    
            require 'views/dishes/dishesIngredients.php';
        }
    }

?>