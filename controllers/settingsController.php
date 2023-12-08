<?php 
require_once ('classes.php');

class settingsController extends Controller{
    public function index(){

        require 'language/textCommon.php';
        require('models/settingsModel.php');
        require 'config.php';
    
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;
        $settingsModelInstance = new settingsModel;

        require 'views/settings.php';
    }
}
?>