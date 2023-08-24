<?php
class User {
    private $id = -1;
    private $email = "";
    private $displayname = "";
    private $admin = 0;
    private $customerid = -1;
    private $guest = false;

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }
}
?>