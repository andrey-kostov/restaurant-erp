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
                //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                $stmt->bind_param("iis",$lastId,$lastId,$categoryName);
                $stmt->execute();
                $stmt->close();
            }
        }

        //Uptade drink category
        public function updateDrinkCategory($drinkCategotyId,$drinkCategoryName) {

            $sql = "UPDATE drinks_categories SET category_name = '" . $drinkCategoryName . "' WHERE category_id = " . $drinkCategotyId . "";
            $stmt = $this->drinksModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        //Delete drink category
        public function deleteCategory($drinkCategoryId) {
            $sql = "DELETE FROM drinks_categories WHERE category_id='" . $drinkCategoryId . "'";
            $stmt = $this->drinksModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        //Get single category
        public function getSingleDrinkCategory($drinkCategoryId) {
            $sql = "SELECT * FROM `drinks_categories` WHERE `category_id` = ".$drinkCategoryId."";
            $stmt = $this->drinksModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $categoryToEdit = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $categoryToEdit; // returns result
            }
    
            return false;
        }

        //Add new drink
        public function addDrink($drinkName,$drinkHomePrice,$drinkPrice,$drinkCategory) {
            //Get last id 
            $sqlA = "SELECT MAX(id) as max_id FROM `drinks`";
            $stmtA = $this->drinksModelInstance->prepare($sqlA);
            
            $homePrice = $drinkHomePrice;
            $price = $drinkPrice;

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
                //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                $stmt->bind_param("iisddi",$lastId,$lastId,$drinkName,$homePrice,$price,$drinkCategory);
                $stmt->execute();
                $stmt->close();
            }
            $_POST = array();
        }

        //Uptade drink
        public function updateDrink($drinkId,$drinkName,$drinkHomePrice,$drinkPrice,$drinkCategory) {

            $sql = "UPDATE drinks SET drink_name = '" . $drinkName . "', drink_home_price = " . $drinkHomePrice . ", drink_price = " . $drinkPrice . ", drink_category = " . $drinkCategory . " WHERE drink_id = " . $drinkId . "";
            $stmt = $this->drinksModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
            $_POST = array();
        }

        //Delete drink
        public function deleteDrink($drinkId) {
            $sql = "DELETE FROM drinks WHERE drink_id='" . $drinkId . "'";
            $stmt = $this->drinksModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
            $_POST = array();
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

        //Get single drink
        public function getSingleDrink($drinkId) {
            $sql = "SELECT * FROM `drinks` WHERE `drink_id` = ".$drinkId."";
            $stmt = $this->drinksModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $singleDrink = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $singleDrink; // returns result
            }
    
            return false;
        }

        //Get all drinks 
        public function getAllDrinks() {
            $sql = "SELECT * FROM `drinks`";
            $stmt = $this->drinksModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $drinksCategoriesList = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $drinksCategoriesList; // returns result
            }
    
            return false;
        }
    }
?>