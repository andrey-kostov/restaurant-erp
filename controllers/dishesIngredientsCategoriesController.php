<?php 

    require_once ('classes.php');

    class dishesIngredientsCategoriesController extends Controller{

        private $dishesIngredientsCategoriesController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->dishesIngredientsCategoriesController = new Controller();
        }

        public function index(){
        
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;

            //Add new dishes ingredients category
            if (isset($_POST['action']) && $_POST['action'] == 'addDishesIngredientsCategory') {
                $categoryName = isset($_POST['dishesIngredientsCategoryName']) ? $_POST['dishesIngredientsCategoryName'] : null;
                $dishesModelInstance->addDishesIngredientsCategories($categoryName);
            }

            //Update category
            if (isset($_POST["inputCategoryUpdateName"])) {
                $inputUpdateCategoryId = $_POST["inputUpdateCategoryId"];
                $inputCategoryUpdateName = $_POST["inputCategoryUpdateName"];
                $dishesModelInstance->updateDishesIngredientsCategory($inputUpdateCategoryId,$inputCategoryUpdateName);
            }

            //Delete category
            if (isset($_POST['action']) && $_POST['action'] == 'deleteDishesIngredientsCategory') {
                $dishesCategoryId = isset($_POST['dishesIngredientsCategoryId']) ? $_POST['dishesIngredientsCategoryId'] : null;
             
                $dishesModelInstance->deleteDishesIngredientsCategory( $dishesCategoryId);
            }

            //Display categories
            $dishesIngredientsCategories = $dishesModelInstance->getDishesIngredientsCategories();
    
            require 'views/dishes/dishesIngredientsCategories.php';
        }

        public function edit(){
            require 'models/dishesModel.php';
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require 'config.php';
            
            $root = $globalRoot;
            $storeCurrency = $globalCurrency;
    
            //Get url query
            $url = parse_url($_SERVER['REQUEST_URI']);
            // Split the URL 
            $urlQuery = explode('dishesIngredientsCategoryId=',$url['query']);

            //Get the dishes category
            $dishesModelInstance = new dishesModel;
            $categoryToEdit =  $dishesModelInstance->getSingleDishesIngredientsCategory($urlQuery[1]);
    
            require 'views/dishes/dishesIngredientsCategoriesEdit.php';
        }
    }

?>