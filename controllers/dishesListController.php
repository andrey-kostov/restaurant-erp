<?php 

    require_once ('classes.php');

    class dishesListController extends Controller{

        private $dishesListController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->dishesListController = new Controller();
        }

        public function index(){
        
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require('models/dishesModel.php');
            require 'config.php';
        
            $root = $globalRoot;
            $storeCurrency = $globalCurrency;
            $dishesModelInstance = new dishesModel;
    
            
            // //Add new drink category
            // if (isset($_POST["inputCategoryName"])) {
            //     $categoryName = $_POST["inputCategoryName"];
            //     $dishesModelInstance->adddishesCategories($categoryName);
            // }
    
            // //Update category
            // if (isset($_POST["inputCategoryUpdateName"])) {
            //     $inputUpdateCategoryId = $_POST["inputUpdateCategoryId"];
            //     $inputCategoryUpdateName = $_POST["inputCategoryUpdateName"];
            //     $dishesModelInstance->updateDrinkCategory($inputUpdateCategoryId,$inputCategoryUpdateName);
                
            // }
            
            // //Delete category
            // if (isset($_POST['action']) && $_POST['action'] == 'deleteDrinkCategory') {
            //     $drinkId = isset($_POST['drinkCategoryId']) ? $_POST['drinkCategoryId'] : null;
                
            //     $dishesModelInstance->deleteCategory( $drinkId);
            // }
            
            // //Display categories
            $dishesCategories = $dishesModelInstance->getdishesCategories();
            
            

            
            
            require 'views/dishes/dishesList.php';
        }

        function ajaxSearchIngredients(){
            //Search for ingredients
            if (isset($_POST['action']) && $_POST['action'] == 'searchIngredients') {
                require('models/dishesModel.php');
                $dishesModelInstance = new dishesModel;
                    
                $searchIngredients = $_POST["searchedVal"];
                $searchResults = $dishesModelInstance->searchIngredients($searchIngredients);
                
                echo json_encode(['searchResults' => $searchResults]);
            }
        }
    }

?>