<?php 
    require_once ('classes.php');

    class usersModel extends Model{
        private $usersModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->usersModelInstance = new Model();
        }
    }

?>
