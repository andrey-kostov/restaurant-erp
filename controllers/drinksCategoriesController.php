<?php

require_once ('classes.php');

class drinksCategoriesController extends Controller{

    public function index(){
        
        require 'language/textDrinks.php';
        require 'language/textCommon.php';
        require('models/drinksModel.php');
        $drinksModelInstance = new drinksModel;

        //Add new drink category
        if (isset($_POST['action']) && $_POST['action'] == 'addDrinksCategory') {
            $categoryName = isset($_POST['drinksCategoryName']) ? $_POST['drinksCategoryName'] : null;
            $drinksModelInstance->addDrinksCategories($categoryName);
        }

        //Update category
        if (isset($_POST["inputCategoryUpdateName"])) {
            $inputUpdateCategoryId = $_POST["inputUpdateCategoryId"];
            $inputCategoryUpdateName = $_POST["inputCategoryUpdateName"];
            $drinksModelInstance->updateDrinkCategory($inputUpdateCategoryId,$inputCategoryUpdateName);
            
        }
        
        //Delete category
        if (isset($_POST['action']) && $_POST['action'] == 'deleteDrinkCategory') {
            $drinkId = isset($_POST['drinkCategoryId']) ? $_POST['drinkCategoryId'] : null;
            
            $drinksModelInstance->deleteCategory( $drinkId);
        }
        
        //Display categories
        $drinksCategories = $drinksModelInstance->getDrinksCategories();
        
        require 'views/drinks/drinksCategories.php';
    }

    public function edit(){
        require 'models/drinksModel.php';
        require 'language/textDrinks.php';
        require 'language/textCommon.php';
        require 'config.php';
        
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;

        //Get url query
        $url = parse_url($_SERVER['REQUEST_URI']);
        // Split the URL 
        $urlQuery = explode('drinkCategoryId=',$url['query']);
        
        //Get the drink
        $drinksModelInstance = new drinksModel;
        $categoryToEdit =  $drinksModelInstance->getSingleDrinkCategory($urlQuery[1]);

        require 'views/drinks/drinksCategoriesEdit.php';
    }

}

?>