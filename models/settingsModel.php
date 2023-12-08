<?php 

    require_once ('classes.php');

    class settingsModel extends Model{

        private $settingsModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->settingsModelInstance = new Model();
        }
    }