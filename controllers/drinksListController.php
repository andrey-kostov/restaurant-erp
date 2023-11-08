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
                $drinksModelInstance->addDrink($inputDrinkName,$inputDrinkHousePrice,$inputDrinkClientPrice, $inputDrinkCategory);
            }

            //Get all drinks
            $drinksResult = $drinksModelInstance->getAllDrinks(); 
            $allDrinks = [];
            foreach ($drinksResult as $drinks){
                $thisId = $drinks['drink_category'];
                $thisCategory = $drinksModelInstance->getDrinksCategory($thisId);

                $item = array(
                    'id' => $drinks['id'],
                    'drink_id' => $drinks['drink_id'],
                    'drink_name' => $drinks['drink_name'],
                    'drink_home_price' => $drinks['drink_home_price'],
                    'drink_price' => $drinks['drink_price'],
                    'drink_category' => $thisCategory[0]['category_name']
                );
                $allDrinks[] = $item;

            }

            
           
            require 'views/drinks/drinksList.php';
        }

        public function edit(){
            require 'models/drinksModel.php';
            require 'language/textDrinks.php';

            $storeCurrency = 'BGN';

            //Get url query
            $url = parse_url($_SERVER['REQUEST_URI']);

            // Split the URL 
            $urlQuery = explode('drinkId=',$url['query']);
            
            //Get the drink
            $drinksModelInstance = new drinksModel;
            $drinkToEdit =  $drinksModelInstance->getSingleDrink($urlQuery[1]);
            $drinksCategories = $drinksModelInstance->getDrinksCategories();


            require 'views/drinks/drinksEdit.php';
        }

    }

        
?>