<?php
require_once "Product.php";

class Basket {
    private $items = []; // type: Product[]

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    function GetProduct($id) {
        for ($i=0; $i < count($this->items); $i++)
            if ($this->items[$i]->id == $id) return $this->items[$i];

        return null;
    }

    function AddProduct($p) {
        $this->items[] = $p;
    }
}
