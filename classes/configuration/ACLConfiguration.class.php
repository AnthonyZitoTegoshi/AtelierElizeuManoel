<?php
    

    class ACL{
        private $database;
        private $emptyUser = false;
        
        function __construct(){
            $this->database = new DatabaseConnection();
        }

        function checkPermission($permission, $id, $groupId){
            if (!$this->userPermissions($id, $permission)) {
                return false;
            }

            if (!$this->groupPermissions($groupId, $permission)) {
               return false;
            }

            return true;
        }


        

        public function groupPermissions($permission, $groupId){
            $fetch = $this->database->query("SELECT COUNT(*) AS count FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM UserPermissions WHERE permissionName='$permission' AND id='$groupId' ");
            }

            if ($fetch['permission_type']==0) {
                return false;
            }

            return true;

        }

        public function userPermissions($permission, $id){
            $fetch = $this->database->query("SELECT COUNT(*) AS count FROM UserPermissions WHERE permissionName='$permission' AND id='$id' ");

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM UserPermissions WHERE permissionName='$permission' AND id='$id' ");
            }

            if ($fetch['permission_type']==0) {
                return false;
            }

            return true;

        }

       
    }
    

?>
