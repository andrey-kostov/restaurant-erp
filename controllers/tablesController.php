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

        $tableId = isset($_POST['tableId']) ? $_POST['tableId'] : null;
        
        //Get order id
        require('models/tablesModel.php');
        $tablesModelInstance = new tablesModel;
        $orderInformation = $tablesModelInstance->getOrderInformation($tableId);
        $orderId = $orderInformation[0];

        $drinksByCategory = [];

        $drinksModelInstance = new drinksModel;
        $drinksCategories = $drinksModelInstance->getDrinksCategories();

        foreach ($drinksCategories as $category){
            $drinkCategory = [];
            $drinkCategory['category_name'] = $category['category_name'];
            $drinkCategory['category_id'] = $category['category_id'];
            $drinkCategory['drinks'] = $drinksModelInstance->getAllDrinksByCategory($category['category_id']);

            foreach($drinkCategory['drinks'] as &$singleProduct){
                $orderedProducts = $drinksModelInstance->getOrderedDrinks($orderId,$singleProduct['drink_id']);
                if(isset($orderedProducts[0]['qty'])){
                    $singleProduct['quantity'] = $orderedProducts[0]['qty'];
                }else{
                    $singleProduct['quantity'] = 0;
                }
                
            }

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

            foreach($dishCategory['dishes'] as &$singleProduct){
                $orderedProducts = $dishesModelInstance->getOrderedDishes($orderId,$singleProduct['dish_id']);
                if(isset($orderedProducts[0]['qty'])){
                    $singleProduct['quantity'] = $orderedProducts[0]['qty'];
                }else{
                    $singleProduct['quantity'] = 0;
                }
                
            }

            array_push($dishesByCategory,$dishCategory);
        }

        require('views/tables/tableModal.php');
    }

    public function ajaxTableUpdate(){
        $action = isset($_POST['action']) ? $_POST['action'] : null;
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
        $productType = isset($_POST['productType']) ? $_POST['productType'] : null;
        $productId = isset($_POST['productId']) ? $_POST['productId'] : null;
        $tableId = isset($_POST['tableId']) ? $_POST['tableId'] : null;
        $orderId = isset($_POST['orderId']) ? $_POST['orderId'] : null;

        require('models/tablesModel.php');
        $tablesModelInstance = new tablesModel;

        if($productType == "drink"){
            $test = $tablesModelInstance->updateTableDrinks($tableId,$orderId,$productId,$quantity,$action);
            
        }else{
            $tablesModelInstance->updateTableDishes($tableId,$orderId,$productId,$quantity,$action);
        }

        var_dump($test) ;
    }
}
?>