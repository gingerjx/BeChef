<?php

class Recipe{
    private $recipe_id;
    private $author_id;
    private $add_date;
    private $title;
    private $description;
    private $ingredients;
    private $preparation;
    private $preparation_time;
    private $average_cost;
    private $country;
    private $vegetarian;
    private $difficulty_level;
    private $people_number;
    private $kcal_per_person;
    private $image_path;
    private $tags;

    function __construct($title, $description, $ingredients, $preparation, $preparation_time, $average_cost, $country, 
                         $vegetarian, $difficulty_level, $people_number, $kcal_per_person, $image_path, $tags) {
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
        $this->tags = $tags;
    }

/* Validation */
    function isValidTitle() {
        if (strlen($this->title) < 5 || strlen($this->title) > 50)
            return false;
        return true;
    }

    function isValidDescription() {
        if (strlen($this->description) < 50 || strlen($this->description) > 2500)
            return false;
        return true;
    }

    function isValidIngredients() {
        if (empty($this->ingredients))
            return false;

        foreach ($this->ingredients as $ing) {
            if (strlen($ing) < 5 || strlen($ing) > 100)
                return false;
        }

        return true;
    }

    function isValidPreparation() {
        if (empty($this->preparation))
            return false;

        foreach ($this->preparation as $prep) {
            if (strlen($prep) < 5 || strlen($prep) > 100)
                return false;
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
        if (strlen($this->country) < 3 || strlen($this->country) > 50)
            return false;
        else if (!ctype_alpha($this->country)) 
            return false;
        else
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

    function isValidTags() {
        foreach ($this->tags as $tag) {
            if (!ctype_alpha($tag))
                return false;
        }

        return true;
    }

/* Setters */
    function setAuthorID($id) {
        $this->author_id = $id;
    }

    function setRecipeID($id) {
        $this->recipe_id = $id;
    }

    function setAddDate($add_date) {
        $this->add_date = $add_date;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

/* Getters */
    function getRecipeID() {
        return $this->recipe_id;
    }

    function getAuthorID() {
       return $this->author_id;
    }

    function getAddDate() {
        return $this->add_date;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
       return $this->description;
    }

    function getIngredients() {
        return $this->ingredients;
    }

    function getPreparation() {
        return $this->preparation;
    }

    function getPreparationTime() {
       return $this->preparation_time;
    }

    function getAverageCost() {
        return $this->average_cost;
    }

    function getCountry() {
        return $this->country;
    }

    function getVegetarian() {
        return $this->vegetarian;
    }

    function getDifficultyLevel() {
        return $this->difficulty_level;
    }

    function getPeopleNumber() {
        return $this->people_number;
    }

    function getKcalPerPerson() {
        return $this->kcal_per_person;
    }

    function getImagePath() {
        return $this->image_path;
    }

    function getTags() {
        return $this->tags;
    }
}
?>