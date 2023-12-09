<?php 

    require_once ('classes.php');

    class settingsModel extends Model{

        private $settingsModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->settingsModelInstance = new Model();
        }

        //Update settings
        public function updateSettings($settingsArray){
            foreach(json_decode($settingsArray) as $key=>$value){
                return $value;
            }

            // $sqlA = "SELECT MAX(id) as max_id FROM `drinks_categories`";
            // $stmtA = $this->drinksModelInstance->prepare($sqlA);
    
            // if ($stmtA) {
            //     $stmtA->execute(); 
            //     $resultA = mysqli_fetch_array($stmtA->get_result()); 
            //     //New id
            //     if(isset($resultA['max_id'])){
            //         $lastId = $resultA['max_id'] + 1; 
            //     }else{
            //         $lastId = 1;
            //     } 
            //     $stmtA->close(); 
    
            // }

            // $sql = "INSERT INTO `drinks_categories` (id, category_id,category_name) VALUES (?,?,?)";
            // $stmt = $this->drinksModelInstance->prepare($sql);

            // if ($stmt) {
            //     //Binds parameters, 's' for string, 'i' for integer, 'd' for float
            //     $stmt->bind_param("iis",$lastId,$lastId,$categoryName);
            //     $stmt->execute();
            //     $stmt->close();
            // }
            // $sql = "UPDATE drinks_categories SET category_name = '" . $drinkCategoryName . "' WHERE category_id = " . $drinkCategotyId . "";
            // $stmt = $this->drinksModelInstance->prepare($sql);
            // if ($stmt) {
            //     $stmt->execute();
            //     $stmt->close();
            // }
        }
    }