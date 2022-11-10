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
            $this->database->query("SELECT COUNT(*) AS count FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");

            $fetch = $this->database->fetch_assoc();

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");
            }

            if ($fetch['permission_type']==0) {
                return false;
            }

            return true;

        }

        public function userPermissions($permission, $id){
            $this->database->query("SELECT COUNT(*) AS count FROM UserPermissions WHERE permissionName='$permission' AND id='$id' ");

            $fetch = $this->database->fetch_assoc();

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$id' ");
            }

            if ($fetch['permission_type']==0) {
                return false;
            }

            return true;

        }<?php
    

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
            $this->database->query("SELECT COUNT(*) AS count FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");

            $fetch = $this->database->fetch_assoc();

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$groupId' ");
            }

            if ($fetch['permission_type']==0) {
                return false;
            }

            return true;

        }

        public function userPermissions($permission, $id){
            $this->database->query("SELECT COUNT(*) AS count FROM UserPermissions WHERE permissionName='$permission' AND id='$id' ");

            $fetch = $this->database->fetch_assoc();

            if ($fetch['count'] > 0) {
                $this->database->query("SELECT * FROM GroupPermissions WHERE permissionName='$permission' AND groupId='$id' ");
            }

            if ($fetch['permission_type']==0) {
                return false;
            }

            return true;

        }


        
        

    }
    

?>


        
        

    }
    

?>
