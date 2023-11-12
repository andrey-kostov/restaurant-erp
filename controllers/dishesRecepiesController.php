<?php 

    require_once ('classes.php');

    class dishesRecepiesController extends Controller{

        private $dishesRecepiesController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->dishesRecepiesController = new Controller();
        }

        public function index(){
        
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;
    
            
            require 'views/dishes/dishesRecepies.php';
        }
    }

?>