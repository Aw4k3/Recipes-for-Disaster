<?php
require_once "Basket.php";
require_once "Address.php";

class Customer {
    private $firstname = "";
    private $lastname = "";
    private $basket; // Initialise in constructor
    private $address; // Initialise in constructor

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    function __construct($firstname, $lastname) {
        $this->$firstname = $firstname;
        $this->$lastname = $lastname;
        $this->$basket = new Basket();
        $this->$address = new Address();
    }
}
?>