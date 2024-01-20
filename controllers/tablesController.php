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

        require ('language/textCommon.php');
        
        $tableId = isset($_POST['tableId']) ? $_POST['tableId'] : null;

        require ('views/tables/tableModal.php');
    }
}
?>