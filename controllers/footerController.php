<?php

require_once ('classes.php');

class footerController extends Controller{
    public function index(){
        require_once('models/footerModel.php');
        $footerModelInstance = new footerModel;
        
        //Get All Settings
        $allSettings = $footerModelInstance->getAllSettings();
        
        foreach($allSettings as $setting=>$value){
                
            if($setting == 'inputCmsName'){
                $footerTitle=$value['setting_value'];
            }
        }

        require ('views/footer.php');
    }
}

?>