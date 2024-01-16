<?php 
require_once ('classes.php');

class settingsController extends Controller{
    public function index(){

        require ('language/textCommon.php');
        require('models/settingsModel.php');
        require ('config.php');
    
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;
        $settingsModelInstance = new settingsModel;
        
        //Update Categories
        if (isset($_POST['action']) && $_POST['action'] == 'updateSettings') {
            $settingsArray = isset($_POST['settingsArray']) ? $_POST['settingsArray'] : null;
            $settingsModelInstance->updateSettings($settingsArray);
        }

        //Get All Settings
        $allSettings = $settingsModelInstance->getAllSettings();
        
        require ('views/settings.php');
    }
}
?>