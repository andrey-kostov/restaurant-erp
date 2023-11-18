<?php 

    require_once ('classes.php');

    class dishesModel extends Model{

        private $dishesModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->dishesModelInstance = new Model();
        }

        //Get all dishes categories
        public function getDishesCategories() {
            $sql = "SELECT * FROM `dishes_categories`";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                //executes
                $stmt->execute(); 
                //gets the results
                $result = $stmt->get_result(); 
                //bind them in associative array
                $dishesCategoriesList = $result->fetch_all(MYSQLI_ASSOC);
                //closes connection 
                $stmt->close(); 
    
                return $dishesCategoriesList; // returns result
            }
    
            return false;
        }
        
        //Add new dishes categories
        public function addDishesCategories($categoryName) {
            //Get last id 
            $sqlA = "SELECT MAX(id) as max_id FROM `dishes_categories`";
            $stmtA = $this->dishesModelInstance->prepare($sqlA);
    
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

            $sql = "INSERT INTO `dishes_categories` (id, category_id,category_name) VALUES (?,?,?)";
            $stmt = $this->dishesModelInstance->prepare($sql);

            if ($stmt) {
                //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                $stmt->bind_param("iis",$lastId,$lastId,$categoryName);
                $stmt->execute();
                $stmt->close();
            }
        }

        //Uptade dishes category
        public function updateDishesCategory($dishesCategotyId,$dishesCategoryName) {

            $sql = "UPDATE dishes_categories SET category_name = '" . $dishesCategoryName . "' WHERE category_id = " . $dishesCategotyId . "";
            $stmt = $this->dishesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        //Delete dishes category
        public function deleteDishesCategory($dishesCategoryId) {
            $sql = "DELETE FROM dishes_categories WHERE category_id='" . $dishesCategoryId . "'";
            $stmt = $this->dishesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        //Get single category
        public function getSingleDishesCategory($dishesCategoryId) {
            $sql = "SELECT * FROM `dishes_categories` WHERE `category_id` = ".$dishesCategoryId."";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $categoryToEdit = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $categoryToEdit; // returns result
            }
    
            return false;
        }

        //Add new dishes ingredients categories
        public function addDishesIngredientsCategories($categoryName) {
            //Get last id 
            $sqlA = "SELECT MAX(id) as max_id FROM `ingredients_categories`";
            $stmtA = $this->dishesModelInstance->prepare($sqlA);
    
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

            $sql = "INSERT INTO `ingredients_categories` (id, category_id,category_name) VALUES (?,?,?)";
            $stmt = $this->dishesModelInstance->prepare($sql);

            if ($stmt) {
                //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                $stmt->bind_param("iis",$lastId,$lastId,$categoryName);
                $stmt->execute();
                $stmt->close();
            }
        }

        //Get all dishes ingredients categories
        public function getDishesIngredientsCategories() {
            $sql = "SELECT * FROM `ingredients_categories`";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $dishesCategoriesList = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $dishesCategoriesList;
            }
    
            return false;
        }

        //Get single ingredients category
        public function getSingleDishesIngredientsCategory($dishesCategoryId) {
            $sql = "SELECT * FROM `ingredients_categories` WHERE `category_id` = ".$dishesCategoryId."";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $categoryToEdit = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $categoryToEdit; // returns result
            }
    
            return false;
        }

        //Uptade dishes ingredients category
        public function updateDishesIngredientsCategory($dishesCategotyId,$dishesCategoryName) {

            $sql = "UPDATE ingredients_categories SET category_name = '" . $dishesCategoryName . "' WHERE category_id = " . $dishesCategotyId . "";
            $stmt = $this->dishesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }
        
        //Delete dishes ingredients category
        public function deleteDishesIngredientsCategory($dishesCategoryId) {
            $sql = "DELETE FROM ingredients_categories WHERE category_id='" . $dishesCategoryId . "'";
            $stmt = $this->dishesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        //Get all ingredients 
        public function getAllIngredients() {
            $sql = "SELECT * FROM `ingredients`";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $allIngredients = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $allIngredients;
            }
    
            return false;
        }

        //Add new dishes ingredient
        public function addIngredient($ingredientName,$ingredientCategoryName,$ingredientsPricePerKilo) {
            //Get last id 
            $sqlA = "SELECT MAX(ingredient_id) as max_id FROM `ingredients`";
            $stmtA = $this->dishesModelInstance->prepare($sqlA);
            

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

            $sql = "INSERT INTO `ingredients` ( id, ingredient_id, ingredient_name, ingredient_price, ingredient_category) 
                            VALUES (?,?,?,?,?) 
                            ON DUPLICATE KEY UPDATE `ingredient_id` = `ingredient_id` + 1";

            $stmt = $this->dishesModelInstance->prepare($sql);

            if ($stmt) {
                //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                $stmt->bind_param("iisdi",$lastId, $lastId,$ingredientName,$ingredientsPricePerKilo,$ingredientCategoryName);
                $stmt->execute();
                $stmt->close();
            }
        }

        //Delete ingredient
        public function deleteIngredient($ingredientId) {
            $sql = "DELETE FROM ingredients WHERE ingredient_id='" . $ingredientId . "'";
            $stmt = $this->dishesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
            $_POST = array();
        }

        //Get ingredient category
        public function getIngredientsCategory($categoryId) {
            $sql = "SELECT * FROM `ingredients_categories` WHERE `category_id` = ".$categoryId."";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                //executes
                $stmt->execute(); 
                //gets the results
                $result = $stmt->get_result(); 
                //bind them in associative array
                $ingredientsCategoriesList = $result->fetch_all(MYSQLI_ASSOC);
                //closes connection 
                $stmt->close(); 
    
                return $ingredientsCategoriesList; // returns result
            }
    
            return false;
        }

        //Get single ingredient
        public function getSingleIngredied($ingredientId) {
            $sql = "SELECT * FROM `ingredients` WHERE `ingredient_id` = ".$ingredientId."";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $singleIngredient = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $singleIngredient; // returns result
            }
    
            return false;
        }

        //Uptade ingredient
        public function updateIngredient($ingredientId,$ingredientName,$ingredientPrice,$ingredientCategory) {

            $sql = "UPDATE ingredients 
                    SET ingredient_name = '" . $ingredientName . "',
                        ingredient_price = " . $ingredientPrice . ", 
                        ingredient_category = " . $ingredientCategory . " 
                    WHERE ingredient_id = " . $ingredientId . "";
                    
            $stmt = $this->dishesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }
        }

        //Search for ingredients 
        public function searchIngredients($searchIngredients) {
            $sql = "SELECT * FROM `ingredients` WHERE `ingredient_name` LIKE '%".$searchIngredients."%'";
            $stmt = $this->dishesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $ingredientsResults = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 

                return $ingredientsResults; // returns result
            }
    
            return false;
        }
    }
    
?>