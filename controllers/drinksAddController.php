<?php 

    require_once ('classes.php');

    class drinksAddController extends Controller{

        private $drinksAddController;
        
        public function __construct() {
            // Instantiate the Model class
            $this->drinksAddController = new Controller();
        }

        public function index(){
            require 'models/drinksModel.php';
            require 'language/textDrinks.php';

            

            require 'views/drinks/drinksAdd.php';
        }

    }

        
?>