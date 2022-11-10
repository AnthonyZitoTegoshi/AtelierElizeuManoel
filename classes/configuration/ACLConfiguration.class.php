<?php
    

    class ACL{
        private $database;
        private $emptyUser = false;
        
        function __construct(){
            $this->database = new DatabaseConnection();
        }

        function checkPermission($permission, $id, $groupId){
            if (!$this->userPermissions($id, $permission)) {
                echo 'false';
            }

            if (!$this->groupPermissions($groupId, $permission)) {
                echo 'false';
            }

            echo 'true';
        }


        function userPermissions($permission, $userId){
            $this->database->query("SELECT COUNT(*) AS count FROM UserPermissions WHERE permissionName='$permission' AND id='$userId' ");
        }

        public function groupPermissions($permission, $groupId){
            $this->database->query("SELECT COUNT(*) AS count FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");

            $fetch = $this->db->fetch_assoc();

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");
            }

        }


        
        

    }
    

?>