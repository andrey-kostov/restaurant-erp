<?php

require_once ('classes.php');

class drinksCategoriesController extends Controller{
    public function index(){
        
        require 'language/textDrinks.php';

        include('models/drinksModel.php');
        $drinksModelInstance = new drinksModel;
        $drinksModelInstance->testFuncion();

        require 'views/drinks/drinksCategories.php';
    }

    public function addCategory(){
        echo 'works';
    }
}

?>