<?php 

    require_once ('classes.php');

    class dishesCategoriesController extends Controller{

        private $dishesCategoriesController;
        
        public function __construct() {
            // Instantiate the Controller class
            $this->dishesCategoriesController = new Controller();
        }

        public function index(){
        
            require 'language/textDishes.php';
            require 'language/textCommon.php';
            require('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;
    
            
            //Add new dishes category
            if (isset($_POST['action']) && $_POST['action'] == 'addDishesCategory') {
                $categoryName = isset($_POST['dishesCategoryName']) ? $_POST['dishesCategoryName'] : null;
                $dishesModelInstance->addDishesCategories($categoryName);
            }
    
             //Update category
             if (isset($_POST["inputCategoryUpdateName"])) {
                 $inputUpdateCategoryId = $_POST["inputUpdateCategoryId"];
                 $inputCategoryUpdateName = $_POST["inputCategoryUpdateName"];
                 $dishesModelInstance->updateDishesCategory($inputUpdateCategoryId,$inputCategoryUpdateName);
              
             }
            
            //Delete category
            if (isset($_POST['action']) && $_POST['action'] == 'deleteDishesCategory') {
                $dishesCategoryId = isset($_POST['dishesCategoryId']) ? $_POST['dishesCategoryId'] : null;
             
                $dishesModelInstance->deleteDishesCategory( $dishesCategoryId);
            }
            
            //Display categories
            $dishesCategories = $dishesModelInstance->getDishesCategories();
            
            require 'views/dishes/dishesCategories.php';
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
            $urlQuery = explode('dishesCategoryId=',$url['query']);

            //Get the dishes category
            $dishesModelInstance = new dishesModel;
            $categoryToEdit =  $dishesModelInstance->getSingleDishesCategory($urlQuery[1]);
    
            require 'views/dishes/dishesCategoriesEdit.php';
        }
    }

?>