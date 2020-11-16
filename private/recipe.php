<?php
require_once "debug.php";

class Recipe {
    public $authorID;
    public $addDate;
    public $title;
    public $description;
    public $ingredients;
    public $preparation;
    public $preparation_time;
    public $average_cost;
    public $country;
    public $vegetarian;
    public $difficulty_level;
    public $people_number;
    public $kcal_per_person;
    public $image_path;

    function __construct($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, 
                         $country, $vegetarian, $difficulty_level, $people_number, $kcal_per_person, $image_path) {
        $addDate = new DateTime(); 

        $this->title = $title;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->preparation = $preparation;
        $this->preparation_time = $preparation_time;
        $this->average_cost = $average_cost;
        $this->country = $country;
        $this->vegetarian = $vegetarian;
        $this->difficulty_level = $difficulty_level;
        $this->people_number = $people_number;
        $this->kcal_per_person = $kcal_per_person;
        $this->image_path = $image_path;
    }

    function isValidTitle() {
        if (strlen($this->title) < 5 || strlen($this->title) > 50) {
            return false;
        }

        return true;
    }

    function isValidDescription() {
        if (strlen($this->description) < 50 || strlen($this->description) > 2500) {
            return false;
        }

        return true;
    }

    function isValidIngredients() {
        if (empty($this->ingredients))
            return false;

        foreach ($this->ingredients as $ing) {
            if (strlen($ing) < 5 || strlen($ing) > 50) {
                return false;
            }
        }

        return true;
    }

    function isValidPreparation() {
        if (empty($this->preparation))
            return false;

        foreach ($this->preparation as $prep) {
            if (strlen($prep) < 5 || strlen($prep) > 50) {
                return false;
            }
        }

        return true;
    }

    function isValidPreparationTime() {
        $number = (int)$this->preparation_time;
        return $number >= 1 && $number <= 324000;
    }

    function isValidAverageCost() {
        $number = (float)$this->preparation_time;
        return $number > 0.1 && $number <= 1000.0;
    }

    function isValidCountry() {
        if (strlen($this->country) < 3 || strlen($this->country) > 50) {
            return false;
        }
        else if (!ctype_alpha($this->country)) {
            return false;
        }

        return true;
    }

    function isValidDifficultyLevel() {
        $number = (float)$this->difficulty_level;
        return $number >= 1 && $number <= 5;
    }

    function isValidNumberOfPeople() {
        $number = (float)$this->people_number;
        return $number >= 1 && $number <= 10;
    }

    function isValidKcalPerPerson() {
        $number = (float)$this->kcal_per_person;
        return $number >= 1 && $number <= 8000;
    }
}
?>