<?php

require_once ('classes.php');

class headerController extends Controller{
    public function index(){
        require_once ('config.php');
        require_once('models/headerModel.php');
        
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;
        $headerModelInstance = new headerModel;
        
        //Get All Settings
        $allSettings = $headerModelInstance->getAllSettings();
        
        foreach($allSettings as $setting=>$value){
                
            if($setting == 'inputCmsName'){
                $headerTitle=$value['setting_value'];
            }
        }
        
        $headerLogo ='';

        require ('views/header.php');
    }
}

?>