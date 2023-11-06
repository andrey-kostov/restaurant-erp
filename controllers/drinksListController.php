<?php 

    require_once ('classes.php');

    class drinksListController extends Controller{

        private $drinksListController;
        
        public function __construct() {
            // Instantiate the Model class
            $this->drinksListController = new Controller();
        }

        public function index(){
            require 'models/drinksModel.php';
            require 'language/textDrinks.php';

            

            require 'views/drinks/drinksList.php';
        }

    }

        
?>