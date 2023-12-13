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
            $settings = json_decode($settingsArray,true);
            foreach($settings as $key=>$value){
                $sqlA = "SELECT setting_value FROM `settings` WHERE setting_key = ?";
                $stmtA = $this->settingsModelInstance->prepare($sqlA);
                if ($stmtA) {
                    $stmtA->bind_param("s", $key);
                    $stmtA->execute(); 
                    $resultA = mysqli_fetch_array($stmtA->get_result());

                }

                $sqlB = "SELECT MAX(id) as max_id FROM `settings`";
                $stmtB = $this->settingsModelInstance->prepare($sqlB);
        
                if ($stmtB) {
                    $stmtB->execute(); 
                    $resultB = mysqli_fetch_array($stmtB->get_result()); 
                    //New id
                    if(isset($resultB['max_id'])){
                        $lastId = $resultB['max_id'] + 1; 
                    }else{
                        $lastId = 1;
                    } 
                    $stmtB->close(); 
                }

                if(isset($resultA['setting_value'])){
                    $sql = "UPDATE `settings` SET setting_value = '" . $value . "' WHERE setting_key = '" . $key . "'";
                    $stmt = $this->settingsModelInstance->prepare($sql);
                    if ($stmt) {
                        $stmt->execute();
                        $stmt->close();
                    }
                }else{
                    $sql = "INSERT INTO `settings` (id, setting_key, setting_value) VALUES (?,?,?)";
                    $stmt = $this->settingsModelInstance->prepare($sql);
        
                    if ($stmt) {
                        //Binds parameters, 's' for string, 'i' for integer, 'd' for float
                        $stmt->bind_param("iss",$lastId,$key,$value);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            }
        }

        public function getAllSettings(){
            $sql = "SELECT * FROM `settings`";
            $stmt = $this->settingsModelInstance->prepare($sql);
            if ($stmt) {
                $stmt->execute(); 
                $result = $stmt->get_result(); 
                //bind them in associative array
                $allSettingsArray = $result->fetch_all(MYSQLI_ASSOC);
                $allSettings = [];
                foreach ($allSettingsArray as $item) {
                    $allSettings[$item['setting_key']] = [
                        'id' => $item['id'],
                        'setting_value' => $item['setting_value']
                    ];
                }

                return $allSettings;
            }
        }
    }