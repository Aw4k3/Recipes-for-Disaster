<?php
class Recipe {
    private $id = -1;
    private $name = "";
    private $cookingtime = -1;
    private $vegetarian = false;
    private $vegan = false;
    private $halal = false;
    private $rating = 1;
    private $ingredients = "";
    private $instructions = "";
    private $coverimage = "";

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    function SetRating($rating) {
        $this->rating = $rating;
        if ($rating > 5 || $rating < 1) $this->rating = 0; // Range check
    }

    function GetWarnings() {
        $arr = [];
        if ($this->vegetarian == 1) $arr[] = "✔ Vegetarian"; else $arr[] = "✗ Vegetarian";
        if ($this->vegan == 1) $arr[] = "✔ Vegan"; else $arr[] = "✗ Vegan";
        if ($this->halal == 1) $arr[] = "✔ halal"; else $arr[] = "✗ halal";
        
        if (count($arr) > 0) return join(" • ", $arr);
        return "";
    }

    function GetIngredients() {
        // nl2br converts new lines (\n) to html break tags (<br>)
        return nl2br($this->ingredients);
    }

    function GetInstructions() {
        // nl2br converts new lines (\n) to html break tags (<br>)
        return nl2br($this->instructions);
    }
}
?>