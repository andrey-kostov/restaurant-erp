<?php

require_once ('classes.php');

class drinksCategoriesController extends Controller{

    public function index(){
        
        require 'language/textDrinks.php';

        include('models/drinksModel.php');
        $drinksModelInstance = new drinksModel;

        $drinksCategories = $drinksModelInstance->getDrinksCategories();

        if (isset($_POST["inputCategoryName"])) {
            $categoryName = $_POST["inputCategoryName"];
            $drinksModelInstance->addDrinksCategories($categoryName);
        }
        
        require 'views/drinks/drinksCategories.php';
    }

}

?>