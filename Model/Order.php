<?php
class Order {
    private $id = -1;
    private $customerid = -1;
    private $productid = -1;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }
}
?>