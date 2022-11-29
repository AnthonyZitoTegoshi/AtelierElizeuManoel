<?php
    class UserPermissionGateway {

        private $database = null;
        
        public function __construct($database){
            $this->database = $database;    
        }
        
        public function select(){
            $sql = "SELECT permissionId, permissionName, permissionType, id FROM atelier.UserPermissions;";

            try {
                $sql = $this->database->query($sql);
                $result = $sql->fetchAll(\PDO::FETCH_ASSOC); 
                return $result;
            } catch (\PDOException $e) {
                exit($e->getMessage());
            }
        }

        

        
    }



?>

