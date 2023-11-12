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
            require('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;
    
            require 'views/dishes/dishesIngredients.php';
        }
    }

?>