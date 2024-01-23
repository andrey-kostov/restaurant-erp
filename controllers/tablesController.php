<?php 
require_once ('classes.php');

class tablesController extends Controller{
    public function index(){
        require ('language/textCommon.php');
        require('models/settingsModel.php');
        require('models/tablesModel.php');
        require ('config.php');
    
        $root = $globalRoot;
        $settingsModelInstance = new settingsModel;
        $tablesModelInstance = new tablesModel;

        //Add new table
        if (isset($_POST['action']) && $_POST['action'] == 'newTable') {
            $newTableCapacity = isset($_POST['newTableCapacity']) ? $_POST['newTableCapacity'] : null;
            $tablesModelInstance->addNewTable($newTableCapacity);
        }

        //Open table
        if (isset($_POST['action']) && $_POST['action'] == 'openTable') {
            $tableId = isset($_POST['tableId']) ? $_POST['tableId'] : null;
            $tablesModelInstance->updateTable($tableId,1);
        }

        //Close table
        if (isset($_POST['action']) && $_POST['action'] == 'closeTable') {
            $tableId = isset($_POST['tableId']) ? $_POST['tableId'] : null;
            $tablesModelInstance->updateTable($tableId,0);
        }

        //Get all tables

        $tablesList = $tablesModelInstance->getAllTables();

        require ('views/tables/tables.php');
    }

    public function ajaxTableModal(){

        require('language/textCommon.php');
        
        //Get all drinks by category
        
        require('models/drinksModel.php');
        require('language/textDrinks.php');

        $drinksByCategory = [];

        $drinksModelInstance = new drinksModel;
        $drinksCategories = $drinksModelInstance->getDrinksCategories();

        foreach ($drinksCategories as $category){
            $drinkCategory = [];
            $drinkCategory['category_name'] = $category['category_name'];
            $drinkCategory['category_id'] = $category['category_id'];
            $drinkCategory['drinks'] = $drinksModelInstance->getAllDrinksByCategory($category['category_id']);

            array_push($drinksByCategory,$drinkCategory);
        }

        //Get all dishes by category
        
        require('models/dishesModel.php');
        require('language/textDishes.php');

        $dishesByCategory = [];
        $dishesModelInstance = new dishesModel;
        $dishesCategories = $dishesModelInstance->getDishesCategories();

        foreach ($dishesCategories as $category){
            $dishCategory = [];
            $dishCategory['category_name'] = $category['category_name'];
            $dishCategory['category_id'] = $category['category_id'];
            $dishCategory['dishes'] = $dishesModelInstance->getAllDishesByCategory($category['category_id']);

            array_push($dishesByCategory,$dishCategory);
        }


        $tableId = isset($_POST['tableId']) ? $_POST['tableId'] : null;

        require('views/tables/tableModal.php');
    }
}
?>