<?php 

    require_once ('classes.php');

    class drinksModel extends Model{

        private $drinksModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->drinksModelInstance = new Model();
        }

        //Get all drinks categories
        public function getDrinksCategories() {
            $sql = "SELECT * FROM `drinks_categories`";
            $stmt = $this->drinksModelInstance->prepare($sql);
    
            if ($stmt) {
                //executes
                $stmt->execute(); 
                //gets the results
                $result = $stmt->get_result(); 
                //bind them in associative array
                $drinksCategoriesList = $result->fetch_all(MYSQLI_ASSOC);
                //closes connection 
                $stmt->close(); 
    
                return $drinksCategoriesList; // returns result
            }
    
            return false;
        }
        
        //Add new drinks categories
        public function addDrinksCategories($categoryName) {
            $sqlA = "SELECT MAX(id) as max_id FROM `drinks_categories`";
            $stmtA = $this->drinksModelInstance->prepare($sqlA);
    
            if ($stmtA) {
                $stmtA->execute(); 
                $resultA = mysqli_fetch_array($stmtA->get_result()); 
                //new id
                $lastId = $resultA['max_id'] + 1; 
                $stmtA->close(); 
    
            }

            $sql = "INSERT INTO `drinks_categories` (id, category_id,category_name) VALUES (?,?,?)";
            $stmt = $this->drinksModelInstance->prepare($sql);

            if ($stmt) {
                //bind parameters, 's' meaning string
                $stmt->bind_param("sss",$lastId,$lastId,$categoryName);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
?>