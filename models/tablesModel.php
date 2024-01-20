<?php 

    require_once ('classes.php');

    class tablesModel extends Model{

        private $tablesModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->tablesModelInstance = new Model();
        }

        //Get all tables
        public function getAllTables() {
            $sql = "SELECT * FROM `tables`";
            $stmt = $this->tablesModelInstance->prepare($sql);
    
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                $tablesList = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close(); 
    
                return $tablesList; 
            }
    
            return false;
        }

        //Add new table
        public function addNewTable($newTableCapacity) {
            //Get last id 
            $sqlA = "SELECT MAX(id) as max_id FROM `tables`";
            $stmtA = $this->tablesModelInstance->prepare($sqlA);
    
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

            $sql = "INSERT INTO `tables` (id, capacity , active) VALUES (?,?,?)";
            $stmt = $this->tablesModelInstance->prepare($sql);
            $active = 0;
            if ($stmt) {
                //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                $stmt->bind_param("iii",$lastId,$newTableCapacity,$active);
                $stmt->execute();
                $stmt->close();
            }
        }

        //Update table
        public function updateTable($tableId,$active){
            $sqlA = "SELECT MAX(id) as max_id FROM `orders`";
            $stmtA = $this->tablesModelInstance->prepare($sqlA);
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

            $sql = "UPDATE `tables` SET active = $active WHERE id = '". $tableId ."'";
            $stmt = $this->tablesModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $stmt->close();
            }

            $status = $active;

            if($active == 1){
                $sqlOrder = "INSERT INTO `orders` (id, table_id , order_status) VALUES (?,?,?)";
                $stmtOrder = $this->tablesModelInstance->prepare($sqlOrder);
                if ($stmt) {
                    //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                    $stmtOrder->bind_param("iii",$lastId,$tableId,$status);
                    $stmtOrder->execute();
                    $stmtOrder->close();
                }
            }else{
                $sqlOrder = "UPDATE `orders` SET order_status = $status WHERE table_id = '". $tableId ."'";
                $stmtOrder = $this->tablesModelInstance->prepare($sqlOrder);
                if ($stmt) {
                    //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                    $stmtOrder->bind_param("iii",$lastId,$newTableCapacity,$active);
                    $stmtOrder->execute();
                    $stmtOrder->close();
                }
            }
        }

    }

?>