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
            require 'config.php';
            require('models/dishesModel.php');
            $dishesModelInstance = new dishesModel;

            $root = $globalRoot;
            $storeCurrency = $globalCurrency;

            
            //New ingredient
             if (isset($_POST['action']) && $_POST['action'] == 'addDishesIngredients') {
                $ingredientName = isset($_POST['ingredientName']) ? $_POST['ingredientName'] : null;
                $ingredientCategoryName = isset($_POST['ingredientCategoryName']) ? $_POST['ingredientCategoryName'] : null;
                $ingredientsPricePerKilo = isset($_POST['ingredientsPricePerKilo']) ? $_POST['ingredientsPricePerKilo'] : null;
                $dishesModelInstance->addIngredient($ingredientName,$ingredientCategoryName,$ingredientsPricePerKilo);
            }

            //Delete ingredient
            if (isset($_POST['action']) && $_POST['action'] == 'deleteDishesIngredients') {
                $ingredientId = isset($_POST['ingredientId']) ? $_POST['ingredientId'] : null;

                $dishesModelInstance->deleteIngredient( $ingredientId);
            }

            //Get all ingredient categories for the select
            $ingredientsCategories = $dishesModelInstance->getDishesIngredientsCategories();
  
            //Display all ingredients
            $ingredients = $dishesModelInstance->getAllIngredients(); 
            $allIngredients = [];
            foreach ($ingredients as $ingredient){
                $thisId = $ingredient['ingredient_category'];
                $thisCategory = $dishesModelInstance->getIngredientsCategory($thisId);
            

                $item = array(
                    'id' => $ingredient['id'],
                    'ingredient_id' => $ingredient['ingredient_id'],
                    'ingredient_name' => $ingredient['ingredient_name'],
                    'ingredient_price' => $ingredient['ingredient_price'],
                    'ingredient_category' => isset($thisCategory[0]['category_name']) ? $thisCategory[0]['category_name'] : 'No category'
                );
                $allIngredients[] = $item;

            }
            require 'views/dishes/dishesIngredients.php';
        }
    }

?>