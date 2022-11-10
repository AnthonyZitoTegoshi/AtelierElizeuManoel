<?php
    class UserGroupsModel {
        private $groupId;
        private $groupName;
    
    public function getGroupId(){
        return $this->groupId;
    }

    public function setGroupId($groupId){
        $this->groupId = $groupId;
        return $this;
    }

    public function getGroupName(){
        return $this->groupName;
    }

    public function setGroupName($groupName){
        $this->groupName = $groupName;
        return $this;
    }

}

?>