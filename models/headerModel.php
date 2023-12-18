<?php 

    require_once ('classes.php');

    class headerModel extends Model{

        private $headerModelInstance;
        
        public function __construct() {
            // Instantiate the Model class
            $this->headerModelInstance = new Model();
        }

        public function getAllSettings(){
            $sql = "SELECT * FROM `settings`";
            $stmt = $this->headerModelInstance->prepare($sql);
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