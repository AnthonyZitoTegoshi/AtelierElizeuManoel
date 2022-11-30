<?php 

class TableConfiguration {
    private $name;
    private $fields;

    function __construct($name, $fields) {
        $this->setName($name);
        $this->setFields($fields);
    }

    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }
    function getFields() {
        return $this->fields;
    }
    function setFields($fields) {
        $this->fields = $fields;
    }
}

?>