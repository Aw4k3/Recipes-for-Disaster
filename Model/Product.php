<?php
class Product {
    private $id = -1;
    private $name = "";
    private $price = -1; 

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    function GetPrice() {
        return $this->price / 100;
    }
}
?>