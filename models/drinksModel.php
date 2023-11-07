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
            //Get last id 
            $sqlA = "SELECT MAX(id) as max_id FROM `drinks_categories`";
            $stmtA = $this->drinksModelInstance->prepare($sqlA);
    
            if ($stmtA) {
                $stmtA->execute(); 
                $resultA = mysqli_fetch_array($stmtA->get_result()); 
                //New id
                if(isset($resultA['max_id'])){
                    $lastId = $resultA['max_id'] + 1; 
                }else{
                    $lastId = 1;
                } 
                $stmtA->close(); 
    
            }

            $sql = "INSERT INTO `drinks_categories` (id, category_id,category_name) VALUES (?,?,?)";
            $stmt = $this->drinksModelInstance->prepare($sql);

            if ($stmt) {
                //Binds parameters, 's' for string, 'i' for integer
                $stmt->bind_param("iis",$lastId,$lastId,$categoryName);
                $stmt->execute();
                $stmt->close();
            }
            $_POST = array();
            var_dump($_POST);
        }

        //Add new drink
        public function addDrink($drinkName,$drinkHomePrice,$drinkPrice,$drinkCategory) {
            //Get last id 
            $sqlA = "SELECT MAX(id) as max_id FROM `drinks`";
            $stmtA = $this->drinksModelInstance->prepare($sqlA);
    
            if ($stmtA) {
                $stmtA->execute(); 
                $resultA = mysqli_fetch_array($stmtA->get_result()); 
                //New id
                if(isset($resultA['max_id'])){
                    $lastId = $resultA['max_id'] + 1; 
                }else{
                    $lastId = 1;
                }
                $stmtA->close(); 
    
            }

            $sql = "INSERT INTO `drinks` (id, drink_id, drink_name, drink_home_price, drink_price, drink_category) VALUES (?,?,?,?,?,?)";
            $stmt = $this->drinksModelInstance->prepare($sql);

            if ($stmt) {
                //Binds parameters, 's' for string, 'i' for integer
                $stmt->bind_param("iisiii",$lastId,$lastId,$drinkName,$drinkHomePrice,$drinkPrice,$drinkCategory);
                $stmt->execute();
                $stmt->close();
            }
            $_POST = array();
            var_dump($_POST);
        }

        //Get all drinks category
        public function getDrinksCategory($categoryId) {
            $sql = "SELECT * FROM `drinks_categories` WHERE `category_id` = ".$categoryId."";
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

        //Get all drinks 
        public function getAllDrinks() {
            $sql = "SELECT * FROM `drinks`";
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
    }
?>