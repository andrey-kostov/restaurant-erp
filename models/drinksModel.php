<?php 

    require_once ('classes.php');

    class drinksModel extends Model{

        private $drinksModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->drinksModelInstance = new Model();
        }

        public function getDrinksCategories() {
            $sql = "SELECT * FROM `drinks_categories`";
            $stmt = $this->drinksModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); //executes
                $result = $stmt->get_result(); //gets the results
                $drinksCategoriesList = $result->fetch_assoc(); //bind them in associative array
                $stmt->close(); //closes connection 
    
                return $drinksCategoriesList; // returns result
            }
    
            return false;
        }
    }
?>