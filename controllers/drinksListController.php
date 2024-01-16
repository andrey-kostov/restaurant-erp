<?php 

    require_once ('classes.php');

    class drinksListController extends Controller{

        private $drinksListController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->drinksListController = new Controller();
        }

        public function index(){
            require ('models/drinksModel.php');
            require ('language/textDrinks.php');
            require ('language/textCommon.php');
            require ('config.php');
            
            $storeCurrency = $globalCurrency;

            //Get all drinks categories for the select
            $drinksModelInstance = new drinksModel;
            $drinksCategories = $drinksModelInstance->getDrinksCategories();

            //New drink
            if (isset($_POST['action']) && $_POST['action'] == 'addNewDrink') {
                $inputDrinkName = isset($_POST['drinkName']) ? $_POST['drinkName'] : null;
                $inputDrinkCategory = isset($_POST['drinksCategoriesName']) ? $_POST['drinksCategoriesName'] : null;
                $inputDrinkHousePrice = isset($_POST['drinkHousePrice']) ? $_POST['drinkHousePrice'] : null;
                $inputDrinkClientPrice = isset($_POST['drinkClientPrice']) ? $_POST['drinkClientPrice'] : null;
                $drinksModelInstance->addDrink($inputDrinkName,$inputDrinkHousePrice,$inputDrinkClientPrice, $inputDrinkCategory);
            }

            //Update drink
            if (isset($_POST["inputUpdateDrinkId"])) {
                $inputUpdateDrinkId = $_POST["inputUpdateDrinkId"];
                $inputUpdateDrinkName = $_POST["inputUpdateDrinkName"];
                $inputUpdateDrinkCategory = $_POST["inputUpdateDrinkCategory"];
                $inputUpdateDrinkHousePrice = $_POST["inputUpdateDrinkHousePrice"];
                $inputUpdateDrinkClientPrice = $_POST["inputUpdateDrinkClientPrice"];
                $drinksModelInstance->updateDrink($inputUpdateDrinkId,$inputUpdateDrinkName,$inputUpdateDrinkHousePrice,$inputUpdateDrinkClientPrice,$inputUpdateDrinkCategory);
                
            }

            //Delete drink
            if (isset($_POST['action']) && $_POST['action'] == 'deleteDrink') {
                $drinkId = isset($_POST['drinkId']) ? $_POST['drinkId'] : null;

                $drinksModelInstance->deleteDrink( $drinkId);
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
                    'drink_category' => isset($thisCategory[0]['category_name']) ? $thisCategory[0]['category_name'] : 'No category'
                );
                $allDrinks[] = $item;

            }
           
            require ('views/drinks/drinksList.php');
        }

        public function edit(){
            require ('models/drinksModel.php');
            require ('language/textDrinks.php');
            require ('language/textCommon.php');
            require ('config.php');
            
            $root = $globalRoot;
            $storeCurrency = $globalCurrency;

            //Get url query
            $url = parse_url($_SERVER['REQUEST_URI']);
            // Split the URL 
            $urlQuery = explode('drinkId=',$url['query']);
            
            //Get the drink
            $drinksModelInstance = new drinksModel;
            $drinkToEdit =  $drinksModelInstance->getSingleDrink($urlQuery[1]);
            $drinksCategories = $drinksModelInstance->getDrinksCategories();

            require ('views/drinks/drinksEdit.php');
        }

    }

        
?>