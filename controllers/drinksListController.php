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
            
            $storeCurrency = 'BGN';

            //Get all drinks categories for the select
            $drinksModelInstance = new drinksModel;
            $drinksCategories = $drinksModelInstance->getDrinksCategories();

            //New drink
            if (isset($_POST["inputDrinkName"])) {
                $inputDrinkName = $_POST["inputDrinkName"];
                $inputDrinkCategory = $_POST["inputDrinkCategory"];
                $inputDrinkHousePrice = $_POST["inputDrinkHousePrice"];
                $inputDrinkClientPrice = $_POST["inputDrinkClientPrice"];
                $drinksModelInstance->addDrink($inputDrinkName,$inputDrinkCategory,$inputDrinkHousePrice,$inputDrinkClientPrice);
            }

            //Get all drinks
            $allDrinks = $drinksModelInstance->getAllDrinks();
            foreach ($allDrinks as $drinks){
                $thisId = $drinks['drink_id'];
                $thisCategory = $drinksModelInstance->getDrinksCategory($thisId);
                // var_dump($thisCategory);
                // $drinks['drink_category'] = $thisCategory[0]['category_name'];
            }
           
            require 'views/drinks/drinksList.php';
        }

    }

        
?>